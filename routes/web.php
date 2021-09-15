<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Post\Category\PostCategoryController;
use App\Http\Controllers\Post\Comment\PostCommentController;
use App\Http\Controllers\Post\Filter\PostFilterController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Registration\RegistrationController;
use App\Http\Controllers\Session\SessionController;
use Illuminate\Support\Facades\Route;

/*** PostController ***/
Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/post/{id}/edit',[PostController::class, 'edit'])->middleware('auth');
Route::post('/post/{id}/edit/save', [PostController::class, 'update'])->middleware('auth');//change to put
Route::get('/add', [PostController::class, 'create']);
Route::post('/add/save/post', [PostController::class, 'store']);
Route::get('/post/{id}/delete', [PostController::class, 'delete'])->middleware('auth');
Route::post('/post/{id}/delete/archive', [PostController::class, 'archive'])->middleware('auth');

/*** PostCategoryController ***/
Route::get('/add/category', [PostCategoryController::class, 'create'])->middleware('auth');
Route::post('/add/save/category', [PostCategoryController::class, 'store'])->middleware('auth');

/*** PostCommentController ***/
Route::post('/add/save/comment', [PostCommentController::class, 'store']);
Route::post('/comment/{id}/edit', [PostCommentController::class, 'edit']);
Route::post('/comment/{id}/edit/save', [PostCommentController::class, 'update']);
Route::post('/comment/{id}/delete', [PostCommentController::class, 'delete']);
Route::post('/comment/{id}/delete/archive', [PostCommentController::class, 'archive']);

/*** PostFilterController ***/
Route::get('/posts/author/{user:slug}', [PostFilterController::class, 'getFilteredPostsByAuthor']);
Route::get('/posts/category/{category}', [PostFilterController::class, 'getFilteredPostsByCategory']);

/*** UserController ***/
Route::get('/users', [UserController::class, 'index']);
Route::get('/profile', [UserController::class, 'getProfile']);
Route::post('/user/{id}/upload/profile-image', [UserController::class, 'uploadProfileImg']);

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
