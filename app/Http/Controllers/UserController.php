<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'users' => User::all()
        ]);
    }

    public function getProfile()
    {

    }

    public function getFilteredPostsByAuthor(User $author)
    {
        return view('posts', [
            'posts' => $author->posts
        ]);
    }
}
