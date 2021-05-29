<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\HttpFoundation\Request;

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

    public static function findOrFail($id)
    {
        $post = static::all()->firstWhere('id', $id);

        if (!$post) throw new ModelNotFoundException();

        return $post;
    }

    public static function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;

        $post->save();
//        dd('1232');
//       $post = Post::create([
//            'title' => $request->title,
//            'excerpt' => $request->excerpt,
//            'body'  => $request->body
//        ]);
//        DB::table('posts')->insert($post);
//        #$post = static::create($data);
//        #return redirect('/add');
//       # return $post;
//        return redirect('/');

            return view('home');
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
