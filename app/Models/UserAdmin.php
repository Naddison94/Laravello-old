<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdmin extends model
{
    use HasFactory;

    public $table = 'user_admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
        'archived_by',
        'archived'
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
