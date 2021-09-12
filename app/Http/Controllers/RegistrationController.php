<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required|min:3|max:25|unique:users,username',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:6|max:255'
        ]);

        $newUser = User::create($request);

        session()->flash('success', 'Your account has been successfully created');

        return view('login', compact('newUser'));
    }
}
