<?php

use App\Http\Controllers\PostsController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use Symfony\Component\HttpFoundation\Request;

//use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
});

Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);
});

Route::resource('/posts',PostsController::class);

//Route::get('/posts', function () {
//    Illuminate\Support\Facades\DB::listen(function ($query) {
//        logger($query->sql);
//    });
//
//    return view('posts', [
//        'posts' => Post::latest()->with('category', 'author')->get()
//    ]);
//});

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

//later send in user when registration is step up
Route::get('/add/category', function (Category $category) {
    return view('add', [
        'category' => $category
    ]);
});

Route::get('/post/{id}/edit', function ($id,Post $post) {
    return view('edit', [
        'id'    => $id,
        'post' => $post
    ]);
});

Route::post('/post/{id}/edit/save', function (Request $request) {
    return view('edit', [
        Post::edit($request)
    ]);
});

Route::get('/add', function (User $author) {
    return view('add', [
        'author' => $author,
        'categories' => Category::all()
    ]);
});

Route::post('/add/save', function (Request $request) {
//    $request->image->store('uploads', 'public');

    return view('add', [
        Post::store($request),
        'categories' => Category::all()

    ]);
});

Route::post('/add/save/category', function (Request $request) {
//    $request->image->store('uploads', 'public');

    return view('add', [
        Category::store($request)
    ]);
});

Route::post('/add/save/comment', function (Request $request) {
    return view('add', [
        Comment::store($request)
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
