<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "Danar Ghulamsyah",
        "email" => "danargh86@gmail.com",
        "image" => "danar.jpg"
    ]);
})->name('about');

Route::get('/posts', function () {
    $blog_posts = [
        [
            "title" => "Judul post pertama",
            "author" => "Danargh",
            "slug" => "judul-post-pertama",
            "body" => "Elit cupidatat nostrud fugiat velit nisi commodo officia deserunt cupidatat labore nostrud in quis voluptate. Nisi dolor incididunt fugiat do. Cupidatat voluptate nisi veniam tempor magna Lorem do ea ut duis amet. Aliqua id ad pariatur adipisicing ut quis excepteur consectetur aliqua sit irure."
        ],
        [
            "title" => "Judul post kedua",
            "author" => "Danargh",
            "slug" => "judul-post-kedua",
            "body" => "Elit cupidatat nostrud fugiat velit nisi commodo officia deserunt cupidatat labore nostrud in quis voluptate. Nisi dolor incididunt fugiat do. Cupidatat voluptate nisi veniam tempor magna Lorem do ea ut duis amet. Aliqua id ad pariatur adipisicing ut quis excepteur consectetur aliqua sit irure."
        ]
    ];
    return view('posts', [
        "title" => "posts", "posts" => $blog_posts
    ]);
})->name('posts');

// halaman single post
Route::get('posts/{slug}', function ($slug) {
    return view('post', ['title' => 'Single post']);
});
