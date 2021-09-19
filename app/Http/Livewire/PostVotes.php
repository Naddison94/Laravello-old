<?php

namespace App\Http\Livewire;

use App\Models\PostRating;
use Livewire\Component;

class PostVotes extends Component
{
    public $post_id;
    public $upvotes;
    public $downvotes;
    public bool $upvoted = false;
    public bool $downvoted = false;

    public function mount($post_id, $upvotes = 0, $downvotes = 0)
    {
        $this->post_id = $post_id;
        $this->upvotes = $upvotes;
        $this->downvotes = $downvotes;
    }

    public function render()
    {
        return view('livewire.post-votes');
    }

    public function upvote($upvote)
    {
        if (!auth()->id()) {
            return;
        }

        //            PostRating::where('post_id', $this->post_id)->where('user_id', auth()->id())->update(['archived' => 0]);
        $hasUpvotedPost = PostRating::select('upvote')->where('post_id' , $this->post_id)->where('user_id', auth()->id())->where('archived', 0)->first();

        if ($hasUpvotedPost) {
            $this->upvoted = true;
            return;
        }

        postRating::create([
            'post_id' => $this->post_id,
            'user_id' => auth()->id(),
            'upvote' => $upvote
        ]);

        $this->upvotes += $upvote;
    }

    public function downvote($downvote)
    {
        if (!auth()->id()) {
            return;
        }

        $hasDownvotedPost = PostRating::select('downvote')->where('post_id' , $this->post_id)->where('user_id', auth()->id())->where('archived', 0)->first();

        if ($hasDownvotedPost) {
            $this->downvoted = true;
            return;
        }

        postRating::create([
            'post_id' => $this->post_id,
            'user_id' => auth()->id(),
            'downvote' => $downvote
        ]);

        $this->downvotes += $downvote;
    }

    public function resetVotes()
    {
        if (!auth()->id()) {
            return;
        }

        PostRating::where('post_id', $this->post_id)->where('user_id', auth()->id())->update(['archived' => 1]);
        return redirect('/post/' . $this->post_id);
    }
}
