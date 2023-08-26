@extends('dashboard.layouts.main')

@section('dashboardContainer')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <article class="col-lg-9">
        <h2 class="mt-4">{{$post->title}}</h2>
        <ul class=" list-unstyled d-flex gap-1">
            <li><a href="/dashboard/posts" class="d-flex align-items-center badge bg-info text-decoration-none"><i style="margin-right: 4px" data-feather="skip-back"></i>Back to posts</a></li>
            <li><a href="/dashboard/posts" class="d-flex align-items-center badge bg-warning text-decoration-none"><i style="margin-right: 4px" data-feather="edit"></i>Edit</a></li>
            <li><a href="/dashboard/posts" class="d-flex align-items-center badge bg-danger text-decoration-none"><i style="margin-right: 4px" data-feather="x-circle"></i>Delete</a></li>
        </ul>
        <p class="mb-4">Created by <a href=" #" class="text-decoration-none">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> </p>
        <img src="https://ecampusontario.pressbooks.pub/app/uploads/sites/2109/2021/11/programming-gb0e197598_1920.jpg" class="card-img-top" style="width: 100%; height: 400px; object-fit: cover" alt="...">
        <p class="mt-4">{!!$post->body!!}</p>
    </article>
</main>
@endsection