<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //Making the view
    function index(){
        return view("profile");
    }
}
