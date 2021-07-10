<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    //Making the view
    function index(User $user, Request $req){
        $user = User::find($user->id);
        return view("profile", [
            "user" => $user
        ]);
    }

    function userEditIndex(User $user){
        $user = User::find($user->id);
        return view("userEdit", [
            "user" => $user,
        ]);
    }

    function userEdit(User $user, Request $req){

        if($user->id === auth()->user()->id) {
            $this->validate($req, [
                "email" => "required|email",
                "fullname" => "required|max:255",
                "username" => "required|max:255",
                "image" => "image|mimes:jpeg,jpg,png,gif,svg|max:4000",
                "bio" => "required"
            ]);
            if (str_contains($user->profile_img, "user.jpg")) {
                if ($req->hasFile("image")) {
                    $imageName = url('/') . "/storage/user/" . auth()->user()->username . ".profile" . time() . "." . $req->image->extension();
                    $req->image->move(public_path('storage/user'), $imageName);
                    User::where("id", $user->id)
                        ->update([
                            "profile_img" => $imageName,
                        ]);
                }
            } elseif ($req->hasFile("image")) {
                $imageName = url('/') . "/storage/user/" . auth()->user()->username . ".profile" . time() . "." . $req->image->extension();
                $req->image->move(public_path('storage/user'), $imageName);
                User::where("id", $user->id)
                    ->update([
                        "profile_img" => $imageName,
                    ]);
            }
            User::where("id", $user->id)
                ->update([
                    "email" => $req->email,
                    "name" => $req->fullname,
                    "username" => $req->username,
                    "bio" => $req->bio
                ]);
        }else{
            return back()->with("error", "You can't update this profile. This is not you! hehehe :^");
        }
        return redirect()->route("user.profile", ["user" => $user]);
    }
}
