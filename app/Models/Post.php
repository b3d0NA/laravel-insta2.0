<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "body",
        "image",
    ];

    function likedBy(User $user){
        return $this->likes->contains("user_id", $user->id);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function likes(){
        return $this->hasMany(Like::class);
    }
}
