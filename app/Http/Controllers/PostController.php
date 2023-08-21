<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function getAllPosts(Request $request)
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = " in " . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('name', request('author'));
            $title = " by " . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "posts" => Post::latest()->filter(request(['category', 'search', 'author']))->with(['author', 'category'])->paginate(4)->withQueryString(),
            "active" => "blog"
        ]);
    }

    public function getDetailPost(Request $request, Post $post)
    {
        return view('post', [
            "title" => "post", "post" => $post,
            "active" => "blog"
        ]);
    }
}
