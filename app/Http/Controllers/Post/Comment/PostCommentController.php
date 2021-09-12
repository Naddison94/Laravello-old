<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:500'
        ]);

        $post = Post::findOrFail($request->post_id);

        if ($validator->fails()) {
            return view('post', compact('post'))->withErrors($validator);
        }

        Comment::store($request);
        return redirect('/post/' . $request->post_id);
    }
}
