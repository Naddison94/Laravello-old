<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


//        $user = User::all()->firstWhere('username', $request->username);
//        auth()->login($user);
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Successfully logged in');
        }
//flash username back if failed password
        return back();
        #return back()->withErrors(['username' => 'username does not exist']);
    }
}
