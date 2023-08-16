@extends('layouts.main')

@section('container')
<h1 class="mb-5">Categories</h1>
@foreach ($categories as $category)
<article class=" mt-5">
    <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
</article>
@endforeach
@endsection
