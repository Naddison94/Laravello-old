<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'archived',
    ];

//    public static function store($category_id)
//    {
//        $post          = new Category();
//        $post->id   = $category_id;
//    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
