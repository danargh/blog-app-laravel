@extends('dashboard.layouts.main')

@section('dashboardContainer')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
    </div>

    <div class=" col-lg-8">
        <form action="/dashboard/posts/{{$post->slug}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titleInputCreatePost" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" value="{{$post->title}}" id="titleInputCreatePost" name="title" aria-describedby="emailHelp" required>
                @error('title')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slugInputCreatePost" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug')is-invalid @enderror" value="{{$post->slug}}" id="slugInputCreatePost" name="slug" aria-describedby="emailHelp" readonly required>
                @error('slug')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categoryInput" class="form-label">Category</label>
                <select id="categoryInput" class="form-select @error('category_id')is-invalid @enderror" name="category_id" aria-label="Default select example">
                    <option value="" selected>Select</option>
                    @foreach ($categories as $category)
                    @if ($categoryId->id == $category->id)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="postBody" class="form-label">Content</label>
                <input id="postBody" type="hidden" class="form-control @error('body')is-invalid @enderror" value="{{$post->body}}" name="body">
                <trix-editor input="postBody"></trix-editor>
                @error('body')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</main>
@endsection