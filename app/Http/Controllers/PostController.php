<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function getAllPosts(Request $request)
    {
        return view('posts', [
            "title" => "posts", "posts" => Post::latest()->get()
        ]);
    }

    public function getDetailPost(Request $request, Post $post)
    {
        return view('post', [
            "title" => "post", "post" => $post
        ]);
    }
}
