<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out');
    }
}
