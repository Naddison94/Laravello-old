<?php

namespace App\Http\Livewire;

use App\Models\PostCommentRating;
use Livewire\Component;

class PostCommentVotes extends Component
{
    public $post_id;
    public $comment_id;
    public $upvotes;
    public $downvotes;
    public bool $upvoted = false;
    public bool $downvoted = false;

    public function mount($post_id, $comment_id, $upvotes = 0, $downvotes = 0)
    {
        $this->post_id = $post_id;
        $this->comment_id = $comment_id;
        $this->upvotes = $upvotes;
        $this->downvotes = $downvotes;
    }

    public function render()
    {
        return view('livewire.post-comment-votes');
    }

    public function upvote($upvote)
    {
        if (!auth()->id()) {
            return;
        }

        $hasUpvotedComment = postCommentRating::select('upvote')->where('comment_id' , $this->comment_id)->where('user_id', auth()->id())->where('archived', 0)->first();

        if ($hasUpvotedComment) {
            $this->upvoted = true;
            return;
        }

        postCommentRating::create([
            'comment_id' => $this->comment_id,
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

        $hasDownvotedComment = postCommentRating::select('downvote')->where('comment_id' , $this->comment_id)->where('user_id', auth()->id())->where('archived', 0)->first();

        if ($hasDownvotedComment) {
            $this->downvoted = true;
            return;
        }

        postCommentRating::create([
            'comment_id' => $this->comment_id,
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

        postCommentRating::where('comment_id', $this->comment_id)->where('user_id', auth()->id())->update(['archived' => 1]);
        return redirect('/post/' . $this->post_id);
    }
}
