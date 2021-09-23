<link rel="stylesheet" href="<?php resource_path()?>/app.css">

<div class="comment-add">
    @if(auth()->id())
        Commenting as <?=auth()->user()->username?>
    @else
        Commenting as Anon
    @endif

    <form action="/add/save/comment" method="POST">
        @csrf
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
        'upvotes' => $comment->comment_upvotes_count,
        'downvotes' => $comment->comment_downvotes_count
        ])

    <div class="comment-card">
        @if($comment->user)
            <a href="/profile/<?= $comment->user->username ?>">
                @if($comment->userInformation->avatar)
                    <img class="profile-image-comment" src="/user/{{ $comment->user->id }}/avatar/{{ $comment->userInformation->avatar }}">
                @else
                    <img class="profile-image-comment" src="/uploads/default_image.jpg">
                @endif
            </a>

            <a href="/profile/<?= $comment->user->username ?>">
                <label class="comment-author"><strong>{{ $comment->user->username }}</strong></label>
            </a>
                <label class="comment-author">- {{ $comment->updated_at->diffForHumans() }}</label>
        @else
            <label class="comment-author"><strong>Anon</strong> - {{ $comment->created_at->diffForHumans() }}</label>
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

                            @if(auth()->user()->id == $comment->user_id)
                                <input type="hidden" name="post_id" value="<?= $comment->post_id ?>">
                                <input type="submit" value="delete">
                            @endif
                    </form>
                @endif

                    <form action="/comment/{{ $comment->id }}/reply" method="POST">
                        @csrf
                        <textarea id="commentReply" name="commentReply" cols="50" rows="8"></textarea>
                        <input type="hidden" name="post_id" value="<?= $comment->post_id ?>">
                        <input type="submit" value="reply">
                    </form>

            @endif
    </div>
        Replies<br>
        @foreach ($comment->commentReplies as $commentReply)
            <div style="display: inline-block; word-wrap: break-word; width:25%; " class="comment-card">
                <img class="profile-image-comment" src="/user/{{ $commentReply->user_id }}/avatar/{{ App\Models\UserInformation::where(['id' => $commentReply->user_id])->pluck('avatar')->first() }}">
                <label class="comment-author"><strong>{{ App\Models\User::where(['id' => $commentReply->user_id])->pluck('username')->first() }}</strong></label>
                <label class="comment-author">- {{ $commentReply->updated_at->diffForHumans() }}</label>

                <p class="comment">{{ $commentReply->reply }} </p>
            </div>
        @endforeach
    @endforeach
</div>
