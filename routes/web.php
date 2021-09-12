<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Post\Category\CategoryController;
use App\Http\Controllers\Post\Comment\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Registration\RegistrationController;
use App\Http\Controllers\Session\SessionController;

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
Route::get('/profile', [UserController::class, 'getProfile']);

/*** CommentController ***/
Route::post('/add/save/comment', [CommentController::class, 'store']);

/*** HomeController ***/
Route::get('/', [HomeController::class, 'home']);
//add a method for showing most popular posts later and or most recently commented on posts

/*** RegistrationController ***/
Route::get('/registration', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('/registration/save', [RegistrationController::class, 'store'])->middleware('guest');

/*** LoginController ***/
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/user', [LoginController::class, 'login'])->middleware('guest');

/*** SessionController ***/
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
