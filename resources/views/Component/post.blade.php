<article class="post-section">

    @auth()
        @if(auth()->user()->id == $post->user_id)
            <a href="<?php resource_path() ?>/post/<?= $post->id ?>/edit">Edit this post</a>
            <a href="<?php resource_path() ?>/post/<?= $post->id ?>/delete">Delete this post</a>
        @endif
    @endauth
    <h1 class="post-title">
        {{ $post->title }}
    </h1>

    @livewire('post-votes', [
        'post_id' => $post->id,
        'upvotes' => $post->post_upvotes_count,
        'downvotes' => $post->post_downvotes_count
    ])

    @if($post->author)
        <p class="post-author">
            <strong>Post author:</strong> <a href="/profile/<?=$post->author->username?>">{{ $post->author->username }}</a> | <strong>Post category:</strong><a href="/posts/category/{{ $post->category->id}}">{{ $post->category->title}}</a>
        </p>
    @endif
    <h3 class="post-excerpt">
        {{ $post->excerpt }}
    </h3>

    <p class="center">
        {!! $post->body !!}
    </p>

    @if($post->img) <img class="center" src="/post_files/{{ $post->id }}/img/{{ $post->img }}">@endif
</article>
<br>



