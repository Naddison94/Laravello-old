@extends('layout')

@section('nav')

@endsection

@section('header')
{{--    <br>--}}
{{--<div class="center">--}}
{{--    <button>--}}
{{--        <a class="button1" href="/add">Add Post</a>--}}
{{--    </button>--}}
{{--</div>--}}
@endsection

@section('body')
    @foreach($posts as $post)
        <article>
            <a href="/post/<?=$post->id?>">
                <h1 class="center">
                    {{ $post->title }}
                </h1>
            </a>

            <p class="center">
                <strong>Post author:</strong> <a href="/author/<?= $post->author->id ?>">{{ $post->author->name }}</a> | <strong>Post category:</strong> <a href="/categories/{{ $post->category->id}}">{{ $post->category->title}}</a>
            </p>

            <h3 class="center">
                {{ $post->excerpt }}
            </h3>

            <p class="center">
                {!! $post->body !!}
            </p>

            <img class="center" src="/uploads/{{ $post->img }}">
        </article>
    @endforeach
@endsection
