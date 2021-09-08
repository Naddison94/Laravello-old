<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/add/category', [CategoryController::class, 'create']);
Route::post('/add/save/category', [CategoryController::class, 'store']);

//change this later to be in a filtered posts controller
Route::get('/categories/{category}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
//change this later to be in a filtered posts controller
Route::get('/author/{author}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});

//add a comment controller
Route::post('/add/save/comment', function (Request $request) {
    return view('add', [
        Comment::store($request)
    ]);
});


//users controller
Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);
});

Route::get('/', function () {
    return view('home');
});
