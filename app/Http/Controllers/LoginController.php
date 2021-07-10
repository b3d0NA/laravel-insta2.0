<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Authing the login
    function login(Request $req){
        $this->validate($req, [
            "email" => "required|email",
            "password" => "required"
        ]);

        if(!auth()->attempt($req->only("email", "password"), $req->remember)){
            return back()->with("status", "Invalid login credentials!");
        }
        return redirect()->route("home");

    }

    //Making the view
    function index(){
        return view("auth.login");
    }

    //Log out the user
    function logout(){
        auth()->logout();
        return redirect()->route("login.index");
    }
}
