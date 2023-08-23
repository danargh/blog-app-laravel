<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $validated = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:5|max:255",
            "repeatPassword" => "required|same:password"
        ]);

        $validated["password"] = bcrypt($validated["password"]);
        User::create($validated);

        session()->flash("successRegister", "Register Success, Please Login");

        return redirect("/login");
    }
}
