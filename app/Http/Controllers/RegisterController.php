<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view("register.index", [
            "title" => "register",
            "active" => "register"
        ]);
    }

    public function storeRegister(Request $request)
    {
        // $token = $request->session()->token();
        // $token = csrf_token();
        $validated = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:5|max:255",
            "repeatPassword" => "required|same:password"
        ]);
    }
}
