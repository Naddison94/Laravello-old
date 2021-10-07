<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }

    public function users()
    {
        return view('Admin.users', [
            'users' => User::all()
        ]);
    }

    public function archive(Request $request)
    {
        User::archive($request->user_id);

        return Redirect::back();
    }

    public function restore(Request $request)
    {
        User::restore($request->user_id);

        return Redirect::back();
    }
}
