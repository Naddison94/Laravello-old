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
        'title',
        'excerpt',
        'body',
        'img',
        'user_id',
        'category_id',
        'archived',
    ];

    public static function findOrFail($id)
    {
        $post = static::all()->firstWhere('id', $id);

        if (!$post) throw new ModelNotFoundException();

        return $post;
    }
}
