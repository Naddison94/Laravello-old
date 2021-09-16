<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostRating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('archived', 0)->with('category', 'author')->paginate(10);
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

        $newPost = Post::store($request);

        $post = Post::findOrFail($newPost->id);
        return view('Post.post', compact('post'));
    }

    public function show($id)
    {
//sort this out I should really be using eloquent relationships
        $post = Post::findOrFail($id);
        $post['postUpvoteCount'] = PostRating::countUpvotes($post->id);
//        $postDownvotes = PostRating::countDownvotes($id);


        return view('Post.post', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() != $post->user_id) {
            return redirect('/post/' . $id)->withErrors('You cannot edit a post you do not own');
        }

        return view('Post.edit', [
            'post' => $post
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
        return Post::archive($request);
    }
}
