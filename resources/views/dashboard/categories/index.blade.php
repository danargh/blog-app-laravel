@extends('dashboard.layouts.main')

@section('dashboardContainer')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
    </div>

    @if (session()->has('successCreateCategory'))
    @include('partials.message', ['type' => 'success', 'message' => session('successCreateCategory')])
    @endif

    @if (session()->has('successUpdateCategory'))
    @include('partials.message', ['type' => 'success', 'message' => session('successUpdateCategory')])
    @endif

    @if (session()->has('successDeleteCategory'))
    @include('partials.message', ['type' => 'success', 'message' => session('successDeleteCategory')])
    @endif

    <form class="d-flex flex-col align-items-center justify-content-start gap-2" action="/dashboard/categories/{{isset($category) ? $category->slug : null}}" method="POST">
        @csrf
        @isset($category)
        @method('PUT')
        @endisset
        <div class="mb-3 w-25">
            <label for="titleInput" class="form-label">Category Name</label>
            @if (isset($category))
            <input type="text" class="form-control @error('name')is-invalid @enderror" value="{{$category->name}}" id="titleInput" name="name" aria-describedby="emailHelp" required>
            @else
            <input type="text" class="form-control @error('name')is-invalid @enderror" value="{{old('name')}}" id="titleInput" name="name" aria-describedby="emailHelp" required>
            @endif
            @error('name')
            <div class="position-absolute invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3 w-25">
            <label for="slugInput" class="form-label">Slug</label>
            @if (isset($category))
            <input type="text" class="form-control @error('slug')is-invalid @enderror" value="{{$category->slug}}" id="slugInput" name="slug" aria-describedby="emailHelp" readonly required>
            @else
            <input type="text" class="form-control @error('slug')is-invalid @enderror" value="{{old('slug')}}" id="slugInput" name="slug" aria-describedby="emailHelp" readonly required>
            @endif
            @error('slug')
            <div class="position-absolute invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>


    <div class="table-responsive small mt-4">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <ul class=" list-unstyled d-flex gap-1">
                            <li><a href="/dashboard/categories/{{$category->slug}}/edit" class="badge bg-warning"><i data-feather="edit"></i></a></li>
                            <li>
                                <form action="/dashboard/categories/{{$category->slug}}" method="POST" class="d-inline">
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