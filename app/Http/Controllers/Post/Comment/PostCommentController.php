<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostCommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:500'
        ]);

        $post = Post::findOrFail($request->post_id)->with('userInformation');
        dd($post);
        if ($validator->fails()) {
            return view('Posts.post', compact('post'))->withErrors($validator);
        }

        Comment::store($request);
        return redirect('/post/' . $request->post_id);
    }

    public function edit($id)
    {
        $comment = Comment::all()->firstWhere('id', $id);

        if (Auth::id() != $comment->user_id) {
            return back()->withErrors('error', 'You can only edit a comment that you made');
        }

        return view('Post.Comment.edit', [
           'comment' => $comment
        ]);
    }

    public function update($id, Request $request)
    {
        Comment::edit($id, $request);
        return redirect("/post/" . $request->post_id);
    }

    public function delete($id, Request $request)
    {

        Comment::archive($id);
        return redirect("/post/" . $request->post_id);
    }

    public function reply($id, Request $request)
    {
        CommentReply::store($id, $request);
        return redirect("/post/" . $request->post_id);
    }
}
