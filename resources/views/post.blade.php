@extends('layouts.main')

@section('container')
<article class="mt-5">
   <h2>{{$post->title}}</h2>
   <p>Created by <a href="#" class="text-decoration-none">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> </p>
   {!!$post->body!!}
</article>
<a href="/posts">Back to posts</a>
@endsection
