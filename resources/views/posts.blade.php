@extends('layouts.main')

@section('container')
<h1>{{$title}}</h1>
@foreach ($posts as $post)
<article class="mb-5 mt-5 border-bottom pb-5">
    <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
    <p>Created by <a href="/authors/{{$post->author->name}}" class="text-decoration-none">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> </p>
    <p>{{ $post->excerpt }}</p>
    <a href="/posts/{{$post->slug}}">Read more...</a>
</article>
@endforeach
@endsection
