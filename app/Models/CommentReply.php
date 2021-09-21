<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommentReply extends Model
{
    use HasFactory;

    public $table = 'post_comment_replies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'comment_id',
        'reply',
        'created_at',
        'updated_at',
        'archived_by',
        'archived',
    ];

    public static function store($id, $request)
    {
        $comment = new CommentReply();
        $comment->user_id = Auth::id() ?: null;
        $comment->comment_id = $id;
        $comment->reply = $request->commentReply;
        $comment->save();
    }

    public function reply()
    {
        return $this->hasOne(Comment::class);
    }
}
