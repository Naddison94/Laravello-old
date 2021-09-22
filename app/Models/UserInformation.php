<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserInformation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'user_information';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'forename',
        'surname',
        'avatar',
        'date_of_birth',
        'gender',
        'country',
        'ethnicity',
        'last_login_date',
        'last_logout_date'
    ];

    protected $dates = [
        'last_login_date',
        'last_logout_date',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public static function updateUserInformation(User $user, Request $request)
    {
        dd('222');
    }

    public static function updateAvatar(User $user, Request $request)
    {dd('333');
        $fileName = false;
        if ($request->file('avatar')) {
            $fileName = $request->file('avatar')->getClientOriginalName();
        }

        $user->img = $fileName;

        if ($user->save() && $fileName != false) {
            $request->image->move(public_path('/user/' . $user->id . '/profileImg/'), $fileName);
        }
    }

//    public function user() {
//        return $this->belongsTo(User::class);
//    }
}
