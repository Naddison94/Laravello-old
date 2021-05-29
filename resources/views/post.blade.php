@extends('layout')

@section('nav')

@endsection

@section('body')
    <article>
        <h1>
            {{ $post->title }}
        </h1>

        <p>
            <strong>Post author:</strong> {{ $post->author->name }} | <strong>Post category:</strong><a href="/categories/{{ $post->category->id}}">{{ $post->category->title}}</a>
        </p>

        <h3>
            {{ $post->excerpt }}
        </h3>

        <p>
            {{ $post->body }}
        </p>
    </article>

    @foreach($post->comments as $comment)
    <div class="comment">
        <p>
            Comment #{{$comment->id}}: {{ $comment->comment }} <br>
            <label><strong>Comment made by:</strong> {{ $comment->user->name }}</label>
        </p>
    </div>
    @endforeach
@endsection

