@extends('layouts.main')

@section('container')
<main class="form-signin w-100 mt-5 mx-auto">
    <form action="/register" method="POST">
        @csrf
        <h1 class="text-center h3 mb-3 fw-bold">Please Register</h1>
        <div class="form-floating">
            <input name="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nameInput" placeholder="example name" required value="{{old('name')}}" />
            <label for="nameInput">Name</label>
            @error('name')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="email" type="email" class="form-control @error('email')is-invalid @enderror" id="emailInput" placeholder="name@example.com" required autocomplete="username" value="{{old('email')}}" />
            <label for="emailInput">Email address</label>
            @error('email')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control @error('password')is-invalid @enderror" id="passwordInputRegister" placeholder="Password" autocomplete="new-password" required />
            <label for="passwordInputRegister">Password</label>
            @error('password')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="repeatPassword" type="password" class="form-control @error('repeatPassword')is-invalid @enderror" id="repeatPasswordInputRegister" placeholder="Password" autocomplete="new-password" required />
            <label for="repeatPasswordInputRegister">Repeat password</label>
            @error('repeatPassword')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
            <small id="repeatPasswordMessage"></small>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">
            Register
        </button>
        <p class="mt-3 text-center">Already registered? <a href="/login">click here</a></p>
    </form>
</main>
@endsection