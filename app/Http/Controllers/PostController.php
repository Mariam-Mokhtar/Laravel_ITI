<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    private $_allPosts = [
        [
            'id' => 1,
            'title' => 'Laravel',
            'posted_by' => 'Ahmed',
            'description' => 'hello description',
            'created_at' => '2022-08-01 10:00:00'
        ],

        [
            'id' => 2,
            'title' => 'PHP',
            'posted_by' => 'Mohamed',
            'description' => 'hello description',
            'created_at' => '2022-08-01 10:00:00'
        ],

        [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Ali',
            'description' => 'hello description',
            'created_at' => '2022-08-01 10:00:00'
        ],
    ];
    //private $_id=3;
    public function index()
    {
        return view('post.index', ['posts' => $this->_allPosts]);
    }
    public function show($id)
    {
        $post = Arr::where($this->_allPosts, function ($item)use($id) {
           return $item['id']==$id;
        });

        $post=last($post);
        return view('post.show', ['post' => $post]);
    }
    public function edit($id)
    {
        $post = Arr::where($this->_allPosts, function ($item)use($id) {
            return $item['id']==$id;
         });
 
         $post=last($post);
        return view('post.edit', ['post' => $post]);
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {

        $post =  [
            'id' => 4,
            'title' => $request->title,
            'posted_by' => $request->creator,
            'created_at' => '2022-08-01 10:00:00',
            'description' => $request->description,
        ];
        $this->_allPosts[]=$post;
        return view('post.index', ['posts' => $this->_allPosts]);
    }
    public function update(Request $request,$id)
    {
  
        return redirect()->route('posts.index');
    }

}
