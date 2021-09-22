<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    public $table = 'post_comments';

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

    public static function findOrFail($id)
    {
        return static::all()->firstWhere('id', $id);
    }

    public static function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id() ?: null;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->save();
    }

    public static function edit($id, Request $request)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->updated_at = Carbon::now();
        $comment->save();
    }

    public static function archive($id)
    {
        $comment = Comment::find($id);
        $comment->archived = 1;
        $comment->updated_at = Carbon::now();
        $comment->save();
    }

    public function posts()
    {
       return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function userInformation()
    {
        return $this->belongsTo(UserInformation::class, 'user_id');
    }

    public function commentUpvotes()
    {
        return $this->hasMany(PostCommentRating::class)->where('upvote', '=', 1)->where('archived', '=', 0);
    }

    public function commentDownvotes()
    {
        return $this->hasMany(PostCommentRating::class)->where('downvote', '=', 1)->where('archived', '=', 0);
    }

    public function commentReplies()
    {
        return $this->hasMany(CommentReply::Class);
    }
}
