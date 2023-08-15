<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('posts/{slug}', [PostController::class, 'show'])->name('post');
