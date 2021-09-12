<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
//        return view('posts', [
//            'posts' => $author->posts
//        ]);

        $posts = Post::latest()->where('archived', 0)->where('user_id', $author->id)->paginate(10);
        return view('posts', compact('posts'));
    }
}
