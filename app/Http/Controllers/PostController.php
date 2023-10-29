<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->get()]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $input += ['user_id' => Auth::id()];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
     public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post, 'comments' => $post->comments()->get()]);
    }
    
     public function comment(Post $post, Comment $comment, Request $request)
    {
        $input = $request['comments'];
        $input += ['post_id' => $post->id];
        $input += ['user_id' => Auth::id()];
        $comment->fill($input)->save();
        
        return redirect('/posts/'.$post->id);
    }
    
}
