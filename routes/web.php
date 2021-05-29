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
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

Route::get('/post/{id}', function ($id) {
    return view('post', [
        'post' => Post::with('comments.user')->findOrFail($id)
    ]);
});

Route::get('/author/{author}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts
    ]);
});

//Route::get('/posts/user', function () {
//
//    return view('posts', [
//        'posts' => Post::with('category')->get()
//    ]);
//});

Route::get('/categories/{category}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts
    ]);
});

//Route::get('/add', function () {
//    return view('add');
//});
//
//Route::post('/add', function () {
//    return view('add');
//});

Route::get('/welcome', function () {
    return view('welcome');
});
