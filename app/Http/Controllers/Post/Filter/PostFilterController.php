<?php

namespace App\Http\Controllers\Post\Filter;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostFilterController extends Controller
{
    public function getFilteredPostsByCategory(Category $category)
    {
        $posts = Post::latest()->where('category_id', $category->id)->where('archived', 0)->paginate(10);
        return view('posts', compact('posts'));
    }

    public function getFilteredPostsByAuthor(User $author)
    {
        $posts = Post::latest()->where('user_id', $author->id)->where('archived', 0)->paginate(10);
        return view('posts', compact('posts'));
    }
}
