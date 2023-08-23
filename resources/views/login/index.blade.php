@extends('layouts.main')

@section('container')



<main class="form-signin w-100 mt-5 mx-auto">
    @if (session()->has('successRegister'))
    @include('partials.message', ['type' => 'success', 'message' => session('successRegister')])
    @endif

    @if (session()->has('loginError'))
    @include('partials.message', ['type' => 'error', 'message' => session('loginError')])
    @endif

    <h1 class="text-center h3 mb-3 fw-bold">Please Login</h1>
    <form action="/login" method="POST">
        @csrf
        <div class="form-floating">
            <input type="email" class="form-control @error('email')is-invalid @enderror" id="emailInput" name="email" placeholder="name@example.com" autocomplete="username" autofocus required />
            <label for="emailInput">Email address</label>
            @error('email')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('email')is-invalid @enderror" id="passwordInputLogin" name="password" placeholder="Password" autocomplete="current-password" required />
            <label for="passwordInputLogin">Password</label>
            @error('password')
            <div class="invalid-feedback mb-2">{{$message}}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">
            Login
        </button>
        <p class="mt-3 text-center">Doesn't registered? <a href="/register">click here</a></p>
    </form>
</main>
@endsection