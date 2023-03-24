<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{    public function index()
    {
        $all_posts = Post::withTrashed()->paginate(7);
        return view('post.index', ['posts' => $all_posts]);
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            $post = Post::find($id);
            $comments = $post->comment()->paginate(2);
            $all_users = User::all();
            return view('post.show', ['post' => $post, 'comments' => $comments, 'users' => $all_users]);
        }
    }
    public function edit($id)
    {
        if (is_numeric($id)) {
            $post = Post::find($id);
            $all_users = User::all();
            return view('post.edit', ['post' => $post, 'users' => $all_users]);
        }
    }
    public function create()
    {
        $all_users = User::all();
        return view('post.create', ['users' => $all_users]);
    }
    public function store(StorePostRequest $request)
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', ['disk' => "public"]);
        }
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator,
            'image_path' => $path
        ]);
        return to_route('posts.index');

    }
    public function update(StorePostRequest $request, $id)
    {
        if (is_numeric($id)) {
            $post = Post::find($id);
            if ($request->hasFile("image")) {
                if ($post->image_path) //check if not null (no image)
                    Storage::disk("public")->delete($post->image_path);
                $path = $request->file('image')->store('posts', ['disk' => "public"]);
            } else {
                $path = $post->image_path;
            }
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->creator,
                'slug' => Str::slug($request->title, '-'), //update slug when change title
                'image_path' => $path
            ]);

            return to_route('posts.index');
        }
    }
    public function destroy($id)
    {
        if (is_numeric($id)) {
            $post = Post::find($id);
            if ($post->image_path)
                Storage::disk("public")->delete($post->image_path);
            $post->delete();
            return to_route('posts.index');
        }
    }
    public function pruneOldPost()
    {
        PruneOldPostsJob::dispatch();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();  
        return redirect()->back()->with('success', 'A Post is Restored Successfully!');      
    }
}
