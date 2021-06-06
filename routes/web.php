<?php

use App\Http\Controllers\PostsController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/post/{id}', [PostsController::class, 'show']);
Route::get('/post/{id}/edit',[PostsController::class, 'edit']);
Route::post('/post/{id}/edit/save', [PostsController::class, 'update']);
Route::get('/add', [PostsController::class, 'create']);
Route::post('/add/save', [PostsController::class, 'store']);
Route::get('/post/{id}/delete', [PostsController::class, 'delete']);
Route::post('/post/{id}/delete/archive', [PostsController::class, 'archive']);

Route::get('/author/{author}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});

Route::get('/categories/{category}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('/add/category', function (Category $category) {
    return view('add', [
        'category' => $category
    ]);
});

Route::post('/add/save/category', function (Request $request) {
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

Route::get('/', function () {
    return view('home');
});

Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);
});
