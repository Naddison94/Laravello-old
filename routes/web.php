<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Post\Category\PostCategoryController;
use App\Http\Controllers\Post\Comment\PostCommentController;
use App\Http\Controllers\Post\Filter\PostFilterController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\Profile\ProfileController;
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
Route::post('/comment/{id}/reply', [PostCommentController::class, 'reply']);

/*** PostFilterController ***/
Route::get('/posts/author/{user:slug}', [PostFilterController::class, 'getFilteredPostsByAuthor']);
Route::get('/posts/category/{category}', [PostFilterController::class, 'getFilteredPostsByCategory']);

/*** UserController ***/
//Route::get('/users', [UserController::class, 'index']);

/*** ProfileController ***/
Route::get('/profile/{user:slug}', [ProfileController::class, 'getProfile']);
Route::get('/profile/edit/{user:slug}', [ProfileController::class, 'editProfile']);
Route::post('/profile/edit/{id}/save', [ProfileController::class, 'store']);
//Route::post('/user/{id}/upload/profile-image', [ProfileController::class, 'uploadProfileImg']);

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

/*** AdminController ***/
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/users', [AdminController::class, 'users']);
Route::post('/admin/user/archive', [AdminController::class, 'archive']);
Route::post('/admin/user/restore', [AdminController::class, 'restore']);
