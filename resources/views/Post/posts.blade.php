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
        </article>


    @endforeach
    {{ $posts->links('pagination::bootstrap-4') }}
    @if($posts->count() > 10)
        Posts on this page: {{  $posts->count() }}<br>
    @endif

    Total Posts: {{ $posts->total() }}<br>
@endsection