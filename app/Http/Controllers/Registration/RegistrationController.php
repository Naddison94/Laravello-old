<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('Registration.registration');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required|min:3|max:25|unique:user,username',
            'email' => 'required|max:255|unique:user,email',
            'password' => 'required|min:6|max:255'
        ]);

        User::create($request);

        $request->flashExcept('password');

        session()->flash('success', 'Your account has been successfully created');

        return view('User.login');
    }
}
