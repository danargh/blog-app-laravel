@extends('layouts.main')

@section('container')
<article class="mt-5" style="margin-right: 8rem; margin-left: 8rem">
    <h2 class="mt-4">{{$post->title}}</h2>
    <p class="mb-4">Created by <a href=" #" class="text-decoration-none">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> </p>
    <img src="https://ecampusontario.pressbooks.pub/app/uploads/sites/2109/2021/11/programming-gb0e197598_1920.jpg" class="card-img-top" style="width: 100%; height: 400px; object-fit: cover" alt="...">
    <p class="mt-4">{!!$post->body!!}</p>
    <a href="/posts">Back to posts</a>
</article>
@endsection