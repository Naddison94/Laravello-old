<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\UserInformation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function destroy()
    {
        $userInformation = UserInformation::find(auth::id());
        $userInformation->last_logout_date = Carbon::now();
        $userInformation->save();

        auth()->logout();

        return redirect('/')->with('success', 'Logged out');
    }
}
