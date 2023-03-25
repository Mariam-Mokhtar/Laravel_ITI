<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $all_posts = Post::paginate(3);
        return  PostResource::collection($all_posts);
    }
    public function show($id)
    {
        if (is_numeric($id)) {
            $post = Post::find($id);
            return new PostResource($post);
        }
    }
    public function store(StorePostRequest $request)
    {  
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', ['disk' => "public"]);
        }
        $post=Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator,
            'image_path' => $path
        ]);
        return $post;
    }
}
