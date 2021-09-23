@extends('Component.layout')

@section('body')
    <label>Search
        <input type="text" id="search" name="search">
    </label>

    <label>Categories
        <input type="text" id="Categories" name="Categories">
    </label>
@foreach($posts as $post)
    <article>
        <a href="/post/<?=$post->id?>">
            <h1 class="post-title">
                {{ $post->title }}
            </h1>
        </a>

        <div class="center">
            <strong>Posted by:</strong>
            <div class="tooltip">
                <a href="/posts/author/<?= $post->author->username ?>">{{ $post->author->username }}</a>
                <span class="tooltiptext"> See all posts made by {{ $post->author->username }} </span>
            </div>

            <div class="tooltip">{{ $post->created_at->diffForHumans() }} |
                <span class="tooltiptext"> {{ $post->created_at->toDayDateTimeString() }} </span>
            </div>

            <strong>Post category:</strong>
            <div class="tooltip">
                <a href="/posts/category/{{ $post->category->id}}">{{ $post->category->title }}</a>
                <span class="tooltiptext"> See all posts in the {{ $post->category->title }} category</span>
            </div>
        </div>

        <h3 class="center">
            {{ $post->excerpt }}
        </h3>

        @if($post->img)
            <img class="center" src="/post_files/{{ $post->id }}/img/{{ $post->img }}">
        @endif

        <label style="color:green"> Upvotes: {{ $post->post_upvotes_count }} </label><br>
        <label style="color:red"> Downvotes: {{ $post->post_downvotes_count }}</label> <br>
        Total comments: @if($post->comments_count === 0) None, be the first to comment! @else {{ $post->comments_count }} @endif
    </article>
@endforeach

{{ $posts->links('pagination::bootstrap-4') }}

@if($posts->count() > 10)
    Posts on this page: {{  $posts->count() }}<br>
@endif

Total Posts: {{ $posts->total() }}<br>

@endsection

<script>
    $( function() {
        $( document ).tooltip();
    });
</script>
