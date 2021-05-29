@extends('layout')

@section('nav')

@endsection

@section('header')
    <a href="/add">Add Post</a>
@endsection

@section('body')
    @foreach($posts as $post)
        <article>
            <a href="/post/<?=$post->id?>">
                <h1>
                    {{ $post->title }}
                </h1>
            </a>

            <p>
                <strong>Post author:</strong> <a href="/author/<?= $post->author->id ?>">{{ $post->author->name }}</a> | <strong>Post category:</strong> <a href="/categories/{{ $post->category->id}}">{{ $post->category->title}}</a>
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
