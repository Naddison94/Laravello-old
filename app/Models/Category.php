<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    public $table = 'post_categories';

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
        $validated = $request->validate([
            'title' => 'required|max:45'
        ]);

        $category = new Category();
        $category->user_id = Auth::id() ?: null;
        $category->title = $request->title;
        $category->save();

        return redirect('home');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
