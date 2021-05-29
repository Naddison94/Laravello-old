<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'archived',
    ];

    public function posts()
    {
       return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
