<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('archived', 0)->with('category', 'author')->withCount('comments', 'postUpvotes', 'postDownvotes')->paginate(10);
        return view('Post.posts', compact('posts'));
    }

    public function create(User $author)
    {
        return view('Post.add', [
            'author' => $author,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:80'
        ]);

        $post = Post::store($request);
        return redirect('/post/' . $post->id)->with('success', 'Post added');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->where('archived', 0)->withCount('postUpvotes', 'postDownvotes')->first();

        $comments = Comment::where('post_id', $id)->where('archived', 0)->with('commentReplies')->withCount('commentUpvotes', 'commentDownvotes')->get();

        return view('Post.post', compact('post', 'comments'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all()->where('archived', 0);

        if (Auth::id() != $post->user_id) {
            return redirect('/post/' . $id)->withErrors('You cannot edit a post you do not own');
        }

        return view('Post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        return Post::edit($request);
    }

    public function delete($id, Post $post)
    {
        return view('Post.delete', [
            'id'    => $id,
            'post' => $post
        ]);
    }

    public function archive(Request $request)
    {
        Post::archive($request);
        return redirect('/posts');
    }
}
