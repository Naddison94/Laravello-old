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
        return view('Post.Category.add', [
            Category::store($request),
             'category' => Category::all()
        ])->with('success', "$request->title category has been added");
    }
}
