<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //Selecting all of the posts
    function create(Request $req){
        $this->validate($req, [
            'body' => "required",
            "image" => "required|image|mimes:jpeg,jpg,png,gif,svg|max:4000"
        ]);
        $imageName = auth()->user()->username.".post".time().".".$req->image->extension();
        $imageUpload = $req->image->move(public_path('storage/post'), $imageName);

        $req->user()->post()->create([
           'body' => $req->body,
           'image' => $imageName
        ]);

        return back();
    }

    function storeLike(Post $post, Request $req) {
        if(!$post->likedBy($req->user())){
            $post->likes()->create([
                "user_id" => $req->user()->id,
            ]);
        }

        return back();
    }

    function singlePost(Post $post){
        $post = Post::find($post->id);
        return view("singlePost", [
            "post" => $post,
        ]);
    }
}
