<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "posts", "posts" => Post::getAllPost()
        ]);
    }

    public function show($slug)
    {
        return view('post', [
            "title" => "post", "post" => Post::findPost($slug)
        ]);
    }
}
