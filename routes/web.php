<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*** PostController ***/
Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/post/{id}/edit',[PostController::class, 'edit']);
Route::post('/post/{id}/edit/save', [PostController::class, 'update']);
Route::get('/add', [PostController::class, 'create']);
Route::post('/add/save/post', [PostController::class, 'store']);
Route::get('/post/{id}/delete', [PostController::class, 'delete']);
Route::post('/post/{id}/delete/archive', [PostController::class, 'archive']);

/*** CategoryController ***/
Route::get('/category/{category}', [CategoryController::class, 'getFilteredPostsByCategory']);
Route::get('/add/category', [CategoryController::class, 'create']);
Route::post('/add/save/category', [CategoryController::class, 'store']);

/*** UserController ***/
Route::get('/users', [UserController::class, 'index']);
Route::get('/posts-author/{author}', [UserController::class, 'getFilteredPostsByAuthor']);

/*** CommentController ***/
Route::post('/add/save/comment', [CommentController::class, 'store']);

/*** IndexController ***/
Route::get('/', [IndexController::class, 'home']);
//add a method for showing most popular posts later and or most recently commented on posts
