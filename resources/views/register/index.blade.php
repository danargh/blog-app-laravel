@extends('layouts.main')

@section('container')
<main class="form-signin w-100 mt-5 mx-auto">
    <form>
        <h1 class="text-center h3 mb-3 fw-bold">Please Register</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="example name" />
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" />
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" />
            <label for="floatingPassword">Repeat password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">
            Register
        </button>
        <p class="mt-3 text-center">Already registered? <a href="/login">click here</a></p>
    </form>
</main>
@endsection