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
    @foreach($post->comments as $comment)
        <div class="comment-card">
            @if($comment->user) <label class="comment-author"><strong>{{ $comment->user->username }}</strong> - {{ $comment->created_at }}</label>@endif
            <p class="comment">{{ $comment->comment }}</p>
        </div>
    @endforeach
</div>
