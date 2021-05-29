@extends('layout')

@section('nav')

@endsection

@section('body')
        <article>
            <h1>
                {{ $post->title }}
            </h1>

            <p>
                Post author: {{ $post->user->name }} | Post category:<a href="/categories/{{ $post->category->id}}">{{ $post->category->title}}</a>
            </p>

            <h3>
                {{ $post->excerpt }}
            </h3>

            <p>
                {{ $post->body }}
            </p>
        </article>

        @foreach($post->comments as $comment)
        <div>
            <p>
                Comment #{{$comment->id}}: {{ $comment->comment }} <br>
                <label>Comment made by: {{ $comment->user->name }}</label>
            </p>
        </div>
        @endforeach
@endsection

