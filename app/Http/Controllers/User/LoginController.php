<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            return redirect('/')->with('success', 'Successfully logged in');
        }
//flash username back if failed password
        return back();
        #return back()->withErrors(['username' => 'username does not exist']);
    }
}
