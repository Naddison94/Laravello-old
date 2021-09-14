<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        return view('user.profile', [
           'users' => User::query()->firstWhere('id', Auth::id())
        ]);
    }
}
