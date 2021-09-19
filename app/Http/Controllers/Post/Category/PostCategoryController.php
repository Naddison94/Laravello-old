<?php

namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class PostCategoryController
{
    public function create(Category $category)
    {
        return view('Post.Category.add', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        Category::store($request);
        $posts = Post::latest()->where('archived', 0)->with('category', 'author')->paginate(10);
        return view('Post.posts', compact('posts'))->with('success', "$request->title category has been added");
    }
}
