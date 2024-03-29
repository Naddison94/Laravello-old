<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends model
{
    use HasFactory;

    public $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'excerpt',
        'body',
        'img',
        'archived',
    ];

    public function scopeFilter($query)
    {
         if (request('search')) {
             $query->where('title', 'like', '%' . request('search') . '%')
                   ->orWhere('excerpt', 'like', '%' . request('search') . '%')
                   ->orWhere('category_id', '=', request('search'));
         }
    }

    public static function findOrFail($id)
    {
        $post = static::all()->firstWhere('id', $id);

        if (!$post) throw new ModelNotFoundException();

        return $post;
    }

    public static function store(Request $request)
    {
        $fileName = null;
        //later abstract uploads into sub dirs that are a post id, or add some logic for duplicated files in the same dir
        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $post = new Post;
        $post->user_id = Auth::id() ?: null;
        $post->category_id = $request->category_id ?: DEFAULT_CATEGORY;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->img = $fileName;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path("/post_files/$post->id/img/"), $fileName);
        }

        return $post;
    }

    public static function edit(Request $request)
    {
        $fileName = false;
        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $post = Post::find($request->post_id);
        $post->title = $request->title ?: $post->title;
        $post->category_id = $request->category_id ?: $post->category_id;
        $post->excerpt = $request->excerpt ?: $post->excerpt;
        $post->body = $request->body ?: $post->body;
        $post->img = $fileName ?: $post->img;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path("/post_files/$post->id/img/"), $fileName);
        }

        return redirect('/post/' . $post->id);
    }

    public static function archive(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->archived = 1;

        $post->save();

        return redirect('/');
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function authorInformation()
    {
        return $this->hasOne(UserInformation::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('archived', '=', 0);
    }

    public function postUpvotes()
    {
        return $this->hasMany(PostRating::class)->where('upvote', '=', 1)->where('archived', '=', 0);
    }

    public function postDownvotes()
    {
        return $this->hasMany(PostRating::class)->where('downvote', '=', 1)->where('archived', '=', 0);
    }

//    public function postRatings()
//    {
//        return $this->hasMany(PostRating::class);
//    }
}
