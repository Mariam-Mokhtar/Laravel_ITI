<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {   Comment::create([
            'comment' => $request->comment,
            'commentable_id' => $request->post_id,
            'commentable_type' =>"App\Models\Post",
            'user_id' => $request->creator,
        ]);
        return redirect()->back();
    }
    public function destroy($id)
    {
        if(is_numeric($id))
        {
        Comment::where("id", $id)->delete();
        return redirect()->back();
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
