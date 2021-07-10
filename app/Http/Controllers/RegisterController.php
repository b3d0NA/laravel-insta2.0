<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Registering user

    function register(Request $req){
        $this->validate($req, [
            "email" => "required|email",
            "fullname" => "required|max:255",
            "username" => "required|max:255|unique:users,username",
            "password" => "required"
        ]);

        User::create([
            "email" => $req->input("email"),
            "name" => $req->input("fullname"),
            "username" => $req->input("username"),
            "profile_img" => asset("img/user.jpg"),
            "password" => Hash::make($req->input("password"))
        ]);

        auth()->attempt($req->only("email", "fullname", "username", "password"));

        return redirect()->route("home");
    }

    // Making the view
    function index(){
        return view("auth.register");
    }
}
