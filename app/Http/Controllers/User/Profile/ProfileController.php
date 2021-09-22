<?php


namespace App\Http\Controllers\User\Profile;


use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    public function getProfile($slug)
    {
        $user = User::query()->firstWhere('username', $slug);

        if ($user->userinformation->last_login_date->gt($user->userinformation->last_logout_date)) {
            $user['recent_activity'] = $user->userinformation->last_login_date->diffForHumans();
        } else {
            $user['recent_activity'] = $user->userinformation->last_logout_date->diffForHumans();
        }

        return view('User.Profile.profile', compact('user'));
    }

    public function editProfile($slug)
    {
        return view('User.Profile.edit', [
            'user' => User::query()->firstWhere('username', $slug)
        ]);
    }

    public function store($user_id, Request $request)
    {dd($request->surname);
        if (!$user_id == Auth::id()) {// do validation on nothing being sent in on the form and  storeProf
            return back()->withErrors('error', 'You can only update your own profile picture');
        }

        $user = User::find($user_id);

        UserInformation::updateUserInformation($user, $request);

        if ($request->avatar) {
            UserInformation::updateAvatar($user, $request);
        }

        return view('User.Profile.profile', [
            'user' => $user->refresh()
        ])->with('success', 'Data saved');
    }
}
