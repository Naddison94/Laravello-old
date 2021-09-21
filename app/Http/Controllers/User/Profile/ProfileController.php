<?php


namespace App\Http\Controllers\User\Profile;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController
{

    public function getProfile($slug)
    {
        return view('User.Profile.profile', [
            'user' => User::query()->firstWhere('username', $slug)
        ]);
    }

    public function editProfile($slug)
    {
        return view('User.Profile.edit', [
            'user' => User::query()->firstWhere('username', $slug)
        ]);
    }

    public function store($idUser, Request $request)
    {
        if (!$idUser == Auth::id()) {// do validation on nothing being sent in on the form and  storeProf
            return back()->withErrors('error', 'You can only update your own profile picture');
        }

        $user = User::find($idUser);
        User::storeProfileImg($user, $request);

        return view('User.Profile.profile', [
            'user' => $user->refresh()
        ])->with('success', 'profile image added');
    }
}
