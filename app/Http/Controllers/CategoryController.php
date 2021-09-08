<?php


namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController
{
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
