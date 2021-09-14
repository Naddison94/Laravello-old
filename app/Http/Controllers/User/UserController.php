<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
           'user' => $user = User::query()->firstWhere('id', Auth::id())
        ]);
    }

    public function uploadProfileImg($idUser, Request $request)
    {
        if (!$idUser == Auth::id()) {// do validation on nothing being sent in on the form and  storeProf
            return back()->withErrors('error', 'You can only update your own profile picture');
        }

        $user = User::find($idUser);
        User::storeProfileImg($user, $request);

        return view('user.profile', [
            'user' => $user->refresh()
        ])->with('success', 'profile image added');
    }
}
