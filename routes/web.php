<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

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
        "title" => "home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "Danar Ghulamsyah",
        "email" => "danargh86@gmail.com",
        "image" => "danar.jpg",
        "active" => "about"
    ]);
})->name('about');

Route::get('/posts', [PostController::class, 'getAllPosts'])->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'getDetailPost'])->name('detailPost');

Route::get('/categories/{category:slug}', [CategoryController::class, 'getDetailCategory'])->name('detailCategory');

Route::get('/categories', [CategoryController::class, 'getAllCategories'])->name('categories');

Route::get('/authors/{author:name}', [UserController::class, "getAuthorPost"])->name('authorPost');

Route::get("/login", [LoginController::class, "login"])->name("login");

Route::get("/register", [RegisterController::class, "register"])->name("register");

Route::post("/register", [RegisterController::class, "storeRegister"])->name("register.store");
