@extends('Component.layout')

@section('body')
@foreach($posts as $post)
    <article>
        <a href="/post/<?=$post->id?>">
            <h1 class="center">
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
            <a href="/posts/category/{{ $post->category->id}}">{{ $post->category->title}}</a>
        </div>

        <h3 class="center">
            {{ $post->excerpt }}
        </h3>

        @if($post->img) <img class="center" src="/uploads/{{ $post->img }}">@endif
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
    } );
</script>
