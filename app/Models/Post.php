<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

//    public static function getPostCategory($id)
//    {
//
//        $postCategory = static::all()->firstWhere('category_id', $id);
//
//        if (!$postCategory) throw new ModelNotFoundException();
//
//        return $postCategory;
//    }

//    public function postOwner()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function postComments()
//    {
//        return $this->hasMany(_Comment.::class);
//    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
