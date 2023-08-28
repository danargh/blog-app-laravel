@extends('dashboard.layouts.main')

@section('dashboardContainer')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class=" col-lg-8">
        <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" value="{{old('title')}}" id="titleInput" name="title" aria-describedby="emailHelp" required>
                @error('title')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slugInput" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug')is-invalid @enderror" value="{{old('slug')}}" id="slugInput" name="slug" aria-describedby="emailHelp" readonly required>
                @error('slug')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categoryInput" class="form-label">Category</label>
                <select id="categoryInput" class="form-select @error('category_id')is-invalid @enderror" name="category_id" aria-label="Default select example">
                    <option value="" selected>Select</option>
                    @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
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
                <label for="imageFileInput" class="form-label">Upload Image</label>
                <input class="form-control @error('image')is-invalid @enderror" type="file" id="imageFileInput" name="image" required>
                @error('image')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="postBody" class="form-label">Content</label>
                <input id="postBody" type="hidden" class="form-control @error('body')is-invalid @enderror" value="{{old('body')}}" name="body">
                <trix-editor input="postBody"></trix-editor>
                @error('body')
                <div class="invalid-feedback mb-2">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection