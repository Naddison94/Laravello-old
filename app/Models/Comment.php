<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public static function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id() ?: null;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
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
}
