<div>
    [<a wire:click.prevent="upvote(1)" href="#">+</a>] {{ $upvotes }}
    [<a wire:click.prevent="downvote(1)" href="#">-</a>] {{ $downvotes }}
    | <a wire:click.prevent="resetVotes()" href="#">Reset</a>
    <br><br>
</div>
