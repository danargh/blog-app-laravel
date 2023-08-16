@extends('layouts.main')

@section('container')
<article class="mt-5">
   <h2>{{$post->title}}</h2>
   <p>Created by Danar in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> </p>
   <h5>{{$post->author}}</h5>
   {!!$post->body!!}
</article>
<a href="/posts">Back to posts</a>
@endsection
