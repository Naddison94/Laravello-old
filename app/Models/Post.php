<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Http\Request;

class Post extends model
{
    use HasFactory;

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

//    public function allPosts()
//    {
//            return Post::all()->where('archived', 0);
//    }

    public static function findOrFail($id)
    {
        $post = static::all()->firstWhere('id', $id);

        if (!$post) throw new ModelNotFoundException();

        return $post;
    }

    public static function store(Request $request)
    {
        $fileName = false;
        //later abstract uploads into sub dirs that are a post id, or add some logic for duplicated files in the same dir
        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $post              = new Post;
        $post->category_id = $request->category_id;
        $post->title       = $request->title;
        $post->excerpt     = $request->excerpt;
        $post->body        = $request->body;
        $post->img         = $fileName ?: false;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path('uploads'), $fileName);
        }

        #Category::store($request->category_id);

        return view('home');
    }

    public static function edit(Request $request)
    {
        $fileName = false;
        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }

        $post = Post::find($request->post_id);
        $post->title = $request->title ?: $post->title;
        $post->excerpt = $request->excerpt ?: $post->excerpt;
        $post->body = $request->body ?: $post->body;
        $post->img = $fileName ?: $post->img;

        if ($post->save() && $fileName != false) {
            $request->image->move(public_path('uploads'), $fileName);
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
