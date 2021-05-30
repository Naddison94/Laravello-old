<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public static function store(Request $request)
    {

        $category        = new Category();
        $category->title = $request->title;

        if ($category->save()) {
           return redirect('home');
        }
        //else what
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
