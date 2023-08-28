<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.posts.index", [
            "title" => "dashboard",
            "posts" => Post::where('user_id', auth()->user()->id)->get(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.posts.create", [
            "title" => "Create New Post",
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:posts",
            "category_id" => "required",
            "body" => "required",
            "image" => "required|image|mimes:jpg,jpeg,png,svg|max:5120"
        ]);

        $validated["user_id"] = auth()->user()->id;
        $validated["excerpt"] = Str::limit(strip_tags($request->body), 100, '...');
        $validated["image"] = $request->file('image')->store('post-images');

        Post::create($validated);

        return redirect("/dashboard/posts")->with("successCreatePost", "New post has been added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.posts.show", [
            "title" => "dashboard",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("dashboard.posts.edit", [
            "title" => "Update Post : $post->title",
            "post" => $post,
            "categoryId" => Category::where('id', $post->category_id)->first(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->slug == $post->slug) {
            $validated = $request->validate([
                "title" => "required|max:255",
                "category_id" => "required",
                "body" => "required",
                "image" => "image|mimes:jpg,jpeg,png,svg|max:5120"
            ]);
        } else {
            $validated = $request->validate([
                "title" => "required|max:255",
                "slug" => "required|unique:posts",
                "category_id" => "required",
                "body" => "required",
                "image" => "image|mimes:jpg,jpeg,png,svg|max:5120"
            ]);
        }

        if ($request->image == $post->image) {
            // delete image atrribute from validated
            unset($validated["image"]);
        }

        $validated["user_id"] = auth()->user()->id;
        $validated["excerpt"] = Str::limit(strip_tags($request->body), 100, '...');
        if (isset($validated["image"])) {
            $validated["image"] = $request->file('image')->store('post-images');
            // delete old image from storage
            unlink("storage/$post->image");
        }

        Post::where('id', $post->id)
            ->update($validated);

        return redirect("/dashboard/posts")->with("successUpdatePost", "Post has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect("/dashboard/posts")->with("successDeletePost", "Post has been deleted!");
    }
}
