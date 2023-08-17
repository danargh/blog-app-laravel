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
            "categories" => Category::all()
        ]);
    }

    public function getDetailCategory(Request $request, Category $category)
    {
        return view('category', [
            "title" => $category->name,
            "posts" => $category->posts,
            "category" => $category->name
        ]);
    }
}
