<?php


namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class CategoryController
{
    public function getFilteredPostsByCategory(Category $category)
    {
        $posts = Post::latest()->where('category_id', $category->id)->where('archived', 0)->paginate(10);
        return view('posts', compact('posts'));
    }

    public function create(Category $category)
    {
        return view('add', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        return view('add', [
            Category::store($request),
             'category' => Category::all()
        ])->with('success_message', "$request->title category has been added");
    }
}
