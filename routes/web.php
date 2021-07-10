<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware("auth")->group(function () {
    Route::get("/home", [HomeController::class, "index"])->name("home");
    Route::get("/me", [ProfileController::class, "index"])->name("profile.index");
    Route::post("/post", [PostController::class, "create"])->name("post.create");
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");
    Route::post("post/{post}/like", [PostController::class, "storeLike"])->name("like.store");
    Route::get("user/{user}/edit", [UserProfileController::class, "userEditIndex"])->name("user.edit.index");
    Route::post("user/{user}/edit", [UserProfileController::class, "userEdit"])->name("user.edit");
});
Route::middleware("guest")->group(function () {
    Route::get("/", [LoginController::class, "index"])->name("login.index");
    Route::get('/register', [RegisterController::class, 'index'])->name("register.index");
    Route::post("/register", [RegisterController::class, 'register'])->name("register");
    Route::post("/login", [LoginController::class, "login"])->name("login.auth");
});
Route::get("user/{user}", [UserProfileController::class, "index"])->name("user.profile");
Route::get("p/{post}", [PostController::class, "singlePost"])->name("post.single");
