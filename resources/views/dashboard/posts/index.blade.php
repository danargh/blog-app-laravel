@extends('dashboard.layouts.main')

@section('dashboardContainer')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{auth()->user()->name}}</h1>
    </div>

    @if (session()->has('successCreatePost'))
    @include('partials.message', ['type' => 'success', 'message' => session('successCreatePost')])
    @endif

    @if (session()->has('successDeletePost'))
    @include('partials.message', ['type' => 'success', 'message' => session('successDeletePost')])
    @endif

    @if (session()->has('successUpdatePost'))
    @include('partials.message', ['type' => 'success', 'message' => session('successUpdatePost')])
    @endif

    <h4>Posts</h4>
    <div class="table-responsive small">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create Post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <ul class=" list-unstyled d-flex gap-1">
                            <li><a href="/dashboard/posts/{{$post->slug}}" class="badge bg-info"><i data-feather="eye"></i></a></li>
                            <li><a href="/dashboard/posts/{{$post->slug}}/edit" class="badge bg-warning"><i data-feather="edit"></i></a></li>
                            <li>
                                <form action="/dashboard/posts/{{$post->slug}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i data-feather="x-circle"></i></button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection