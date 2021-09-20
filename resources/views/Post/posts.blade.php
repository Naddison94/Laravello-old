@extends('Component.layout')

@section('body')
    @foreach($posts as $post)
        <article>
            <a href="/post/<?=$post->id?>">
                <h1 class="center">
                    {{ $post->title }}
                </h1>
            </a>

            <p class="center">

                @if($post->author)
                    <strong>Post author:</strong>
                    <a href="/posts/author/<?= $post->author->username ?>">{{ $post->author->username }}</a> |
                @endif

                    <strong>Posted:</strong>
                    {{ $post->created_at->diffForHumans('', 2, 2) }} |

                @if($post->category)
                    <strong>Post category:</strong>
                    <a href="/posts/category/{{ $post->category->id}}">{{ $post->category->title}}</a>
                @else
                    No assigned category
                @endif
            </p>

            <h3 class="center">
                {{ $post->excerpt }}
            </h3>

            @if($post->img) <img class="center" src="/uploads/{{ $post->img }}">@endif
            Total comments: @if($post->comments_count === 0) None, be the first to comment! @else {{ $post->comments_count }} @endif
        </article>


    @endforeach
    {{ $posts->links('pagination::bootstrap-4') }}
    @if($posts->count() > 10)
        Posts on this page: {{  $posts->count() }}<br>
    @endif

    Total Posts: {{ $posts->total() }}<br>
@endsection
