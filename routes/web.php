<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
});

Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);
});

Route::get('/posts', function () {

    Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql);
    });

    return view('posts', [
        'posts' => Post::with('category')->get()
    ]);
});

Route::get('/post/{id}', function ($id) {
    #dd(Post::with('user.comments')->findOrFail($id));
    return view('post', [
        'post' => Post::with('comments.user')->findOrFail($id)
    ]);
});

Route::get('/categories/{category}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
