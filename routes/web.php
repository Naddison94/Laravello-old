<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);
});

//do a route to see all users on site with scott
Route::get('/post/{id}', function ($id) {
    return view('post', [
        'post' => Post::findOrFail($id)
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
