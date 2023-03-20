<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index()
    {
        $all_posts = Post::paginate(7);
        return view('post.index', ['posts' => $all_posts]);
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            $post = Post::find($id);
            $comments = $post->comment()->paginate(3);
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
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator,
        ]);

        return to_route('posts.index');
    }

    public function update(Request $request, $id)
    {
        if (is_numeric($id)) {
            Post::where("id", $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->creator,
            ]);
            return to_route('posts.index');
        }
    }
    public function destroy($id)
    {
        if (is_numeric($id)) {
            Post::where("id", $id)->delete();
            return to_route('posts.index');
        }
    }
}
