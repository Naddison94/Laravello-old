<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

//    public function user() {
//        return $this->belongsTo(User::class);
//    }
}
