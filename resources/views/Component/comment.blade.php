<link rel="stylesheet" href="<?php resource_path()?>/app.css">

<div class="comment-add">
    <form action="/add/save/comment" method="POST">
        @csrf
        <label for="comment">Add a comment</label><br>
        <textarea id="comment" name="comment" cols="50" rows="8"></textarea><br><br>
        @isset($post) <input type="hidden" name="post_id" value="<?= $post->id ?>"> @endisset
        <input type="submit" value="Submit">
    </form>
</div>

<div class="comment-section">

    @foreach($comments as $comment)
        @livewire('post-comment-votes', [
        'post_id' => $comment->post_id,
        'comment_id' => $comment->id,
        'upvotes' => $comment->commentUpvoteCount,
        'downvotes' => $comment->commentDownvoteCount
        ])

    <div class="comment-card">
        @if($comment->user)
            <a href="/profile/<?= $comment->user->username ?>">
                @if($comment->user->img)
                    <img class="profile-image-comment" src="/user/{{ $comment->user->id }}/profileImg/{{ $comment->user->img }}">
                @else
                    <img class="profile-image-comment" src="/uploads/default_image.jpg">
                @endif
            </a>

            <a href="/profile/<?= $comment->user->username ?>">
                <label class="comment-author"><strong>{{ $comment->user->username }}</strong></label>
            </a>
                <label class="comment-author">- {{ $comment->updated_at }}</label>
        @else
            <label class="comment-author"><strong>Anon</strong> - {{ $comment->created_at }}</label>
        @endif
        <p class="comment">{{ $comment->comment }}</p>

            @auth
                @if(auth()->user()->id == $comment->user_id)
                    <form action="/comment/{{ $comment->id }}/edit" method="POST">
                        @csrf

                        <input type="submit" value="edit">
                    </form>
                    <form action="/comment/{{ $comment->id }}/delete" method="POST">
                     @csrf
                        @auth
                            @if(auth()->user()->id == $comment->user_id)
                                <input type="hidden" name="post_id" value="<?= $comment->post_id ?>">
                                <input type="submit" value="delete">
                            @endif
                        @endauth
                    </form>
                @endif
            @endauth
    </div>
    @endforeach
</div>
