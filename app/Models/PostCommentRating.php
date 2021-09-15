<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCommentRating extends Model
{
    use HasFactory;

    public $table = 'post_comment_rating';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_comment_id',
        'user_id',
        'upvote',
        'downvote',
        'updated_at',
        'archived',
    ];

    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
}
