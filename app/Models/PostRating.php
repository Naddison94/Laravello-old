<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRating extends Model
{
    use HasFactory;

    public $table = 'post_rating';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'upvote',
        'downvote',
        'updated_at',
        'archived',
    ];

    public function post()
    {
        return $this->hasOne(Comment::class);
    }
}
