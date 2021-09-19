<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCommentRating extends Model
{
    use HasFactory;

    public $table = 'post_comment_ratings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_id',
        'user_id',
        'upvote',
        'downvote',
        'updated_at',
        'archived',
    ];

    public static function countUpvotes($id)
    {
        return PostCommentRating::where('comment_id' , $id)->where('upvote', 1)->where('archived', 0)->count();
    }

    public static function countDownvotes($id)
    {
        return PostCommentRating::where('comment_id' , $id)->where('downvote', 1)->where('archived', 0)->count();
    }

    public function comment()
    {
        return $this->hasOne(Comment::class);
    }

//    public function ratings()
//    {
//        return $this->belongsTo(Comment::Class);
//    }
}
