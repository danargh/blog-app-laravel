@extends('layouts.main')

@section('container')
<main class="form-signin w-100 mt-5 mx-auto">
    <form action="/register" method="POST">
        @csrf
        <h1 class="text-center h3 mb-3 fw-bold">Please Register</h1>
        <div class="form-floating">
            <input name="name" type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="example name" />
            <label for="floatingInput">Name</label>
            @error('name')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="email" type="email" class="form-control @error('email')is-invalid @enderror" id="floatingInput" placeholder="name@example.com" />
            <label for="floatingInput">Email address</label>
            @error('email')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control @error('password')is-invalid @enderror" id="floatingPassword" placeholder="Password" />
            <label for="floatingPassword">Password</label>
            @error('password')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="repeatPassword" type="password" class="form-control @error('repeatPassword')is-invalid @enderror" id="floatingPassword" placeholder="Password" />
            <label for="floatingPassword">Repeat password</label>
            @error('repeatPassword')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">
            Register
        </button>
        <p class="mt-3 text-center">Already registered? <a href="/login">click here</a></p>
    </form>
</main>
@endsection