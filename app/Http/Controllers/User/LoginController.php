<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('User.login');
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            $userInformation = UserInformation::find(auth::id());
            $userInformation->last_login_date = Carbon::now();
            $userInformation->save();

            return redirect('/')->with('success', 'Successfully logged in');
        }

//flash username back if failed password
        return back();
        #return back()->withErrors(['username' => 'username does not exist']);
    }
}
