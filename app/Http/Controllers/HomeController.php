<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Making the view
    function index(){
        $posts = Post::latest()->paginate(20);
        return view("home", [
            "posts" => $posts
        ]);
    }
}
