<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAuthorPost(Request $request, User $author)
    {
        return view('posts', [
            "title" => "User Posts : " . $author->name,
            "posts" => $author->posts->load(['author', 'category']),
            "active" => 'blog'
        ]);
    }
}
