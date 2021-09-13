<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::with(['user', 'likes']) ->paginate(20);  //retrieve saved post. with(['user', 'likes']) is to decrease quiery. lagi byk lagi bagus

        return view('posts.index', [
            'posts' => $posts  //masukkan posts array dlm posts variable
        ]);
    }

    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'body' => 'required'
        ]);

        //create
        // Post::create([  //1-to-1
        //     'user_id' => auth()->id(),
        //     'body' => $request->body()
        // ]);

        //create and save
        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        
        //redirect
        return back();
    }
}
