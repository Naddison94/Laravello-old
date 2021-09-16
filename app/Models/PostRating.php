<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public static function countUpvotes($id)
    {

        $postUpvotes = PostRating::where('post_id' , $id)->where('upvote', 1)->where('archived', 0)->get();

        return $postUpvotes->count();
    }

//    public static function countDownvotes($id)
//    {
//        $downvoteCount = static::all()->where('post_id', $id);
//
//        return $post;
//    }



    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
