@extends('layout')

@section('nav')

@endsection

@section('body')
    @foreach($posts as $post)
        <article>
            <a href="post/<?=$post->id?>">
                <h1>
                    {{ $post->title }}
                </h1>
            </a>

            <p>
                Post author: {{ $post->user->name }} | Post category: <a href="/categories/{{ $post->category->id}}">{{ $post->category->title}}</a>
            </p>

            <h3>
                {{ $post->excerpt }}
            </h3>

            <p>
                {{ $post->body }}
            </p>
        </article>
    @endforeach
@endsection
