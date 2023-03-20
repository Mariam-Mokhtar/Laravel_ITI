<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {           
        $post=Post::find($request->post_id);
        $post->comment()->create($request->all());
        return redirect()->back();
    }
    public function destroy($id)
    {
        if(is_numeric($id))
        {
          $comment=Comment::find($id);
          $post_id=$comment->commentable->id;
          $comment->delete();
          return to_route('posts.show',$post_id );
        }
    }
    public function update(Request $request,$id)
    {
        if(is_numeric($id))
        {
            Comment::where("id", $id)->update([
                'comment' => $request->comment,
                'user_id' => $request->creator,
            ]);
            return redirect()->back();
        } 
    }
}
