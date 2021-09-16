<?php

namespace App\Http\Livewire;

use App\Models\PostRating;
use Livewire\Component;

class PostVotes extends Component
{
    public $post_id;
    public $upvotes;
    public $downvotes;
    public $upvoted = false;
    public $downvoted = false;

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
        $hasUpvoted = PostRating::where('post_id' , $this->post_id)->where('user_id', auth()->id())->where('archived', 0)->first();

        if ($hasUpvoted) {
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
}
