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
        $userInformation = UserInformation::find($user->id);

        $userInformation->forename = $request->forename;
        $userInformation->surname = $request->surname;
        $userInformation->date_of_birth = $request->date_of_birth;
        $userInformation->gender = $request->gender;
        $userInformation->country = $request->country;
        $userInformation->ethnicity = $request->ethnicity;

        if ($request->avatar) {
            $fileName = false;
            if ($request->file('avatar')) {
                $fileName = $request->file('avatar')->getClientOriginalName();
            }

            $userInformation->avatar = $fileName;

            if ($user->save() && $fileName != false) {
                $request->avatar->move(public_path('/user/' . $user->id . '/avatar/'), $fileName);
            }
        }

        $userInformation->save();
    }

//    public function user() {
//        return $this->belongsTo(User::class);
//    }
}
