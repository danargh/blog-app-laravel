<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAllCategories(Request $request)
    {
        return view('categories', [
            "title" => "categories",
            "categories" => Category::all(),
            "active" => 'categories'
        ]);
    }

    public function getDetailCategory(Request $request, Category $category)
    {
        return view('posts', [
            "title" => 'Category : ' . $category->name,
            "posts" => $category->posts->load(['author', 'category']),
            "active" => 'categories'
        ]);
    }
}
