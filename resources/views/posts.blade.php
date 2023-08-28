@extends('layouts.main')

@section('container')
<h1>{{$title}}</h1>

<form action="/posts" method="GET">
    @if (request('category'))
    <input type="hidden" name="category" value="{{request('category')}}">
    @elseif(request('author'))
    <input type="hidden" name="author" value="{{request('author')}}">
    @endif
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" value="{{request('search')}}" placeholder="Search.." aria-label="Search input" aria-describedby="search">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

@if ($posts->count() && $title == 'All Posts')
<div class="card mb-3 mt-5">
    <img src="{{asset('storage/' . $posts[0]->image)}}" class="card-img-top" style="height: 300px; height: 200px; object-fit: cover" alt="{{$posts[0]->category->name}}">
    <div class="card-body text-center">
        <h5 class="card-title">{{$posts[0]->title}}</h5>
        <p>Created by <a href="/posts?author={{$posts[0]->author->name}}" class="text-decoration-none">{{$posts[0]->author->name}}</a> in <a href="/posts?category={{$posts[0]->category->slug}}">{{$posts[0]->category->name}}</a> {{$posts[0]->created_at}}</p>
        <p class="card-text">{{$posts[0]->excerpt}}</p>
        <p class="card-text"><small class="text-body-secondary">Last updated {{$posts[0]->updated_at->diffForHumans()}} </small></p>
        <a href="/posts/{{$posts[0]->slug}}"><button class="text-decoration-none btn btn-primary">Read More</button></a>
    </div>
</div>
<div class="container">
    <div class="row row-cols-auto">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4" style="margin-bottom: 16px">
            <div class="card">
                <div style="background-color: rgba(0,0,0,0.7)" class="px-3 py-2 position-absolute"><a class="text-white text-decoration-none" href="/posts?category={{$post->category->slug}}">{{$post->category->name}}</a></div>
                <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover" alt="{{$post->category->name}}">
                <div class="card-body">
                    <h5 class=" card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                    <p>Created by <a href="/posts?author={{$post->author->name}}" class="text-decoration-none">{{$post->author->name}}</a> <span class=" text-secondary">{{$post->updated_at->diffForHumans()}}</span> </p>
                    <p class=" card-text">{{ $post->excerpt }}</p>

                    <a href="/posts/{{$post->slug}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">{{ $posts->links() }}</div>
@elseif($posts->count() && (str_contains($title, 'in') || str_contains($title, 'by')))
<div class="container mt-4">
    <div class="row row-cols-auto">
        @foreach ($posts as $post)
        <div class="col-md-4" style="margin-bottom: 16px">
            <div class="card">
                <div style="background-color: rgba(0,0,0,0.7)" class="px-3 py-2 position-absolute"><a class="text-white text-decoration-none" href="/posts?category={{$post->category->slug}}">{{$post->category->name}}</a></div>
                <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover" alt="{{$post->category->name}}">
                <div class="card-body">
                    <h5 class=" card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                    <p>Created by <a href="/posts?author={{$post->author->name}}" class="text-decoration-none">{{$post->author->name}}</a> <span class=" text-secondary">{{$post->updated_at->diffForHumans()}}</span> </p>
                    <p class=" card-text">{{ $post->excerpt }}</p>

                    <a href="/posts/{{$post->slug}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">{{ $posts->links() }}</div>
@else
<h3 class="text-center fs-4 mt-5">No posts found.</h3>
@endif
@endsection