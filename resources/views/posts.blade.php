@extends('layout')

@section('nav')
@endsection

@section('body')
    @foreach($posts as $post)
        <?php dd($post); ?>
        <article>
            <a href="post/<?=$post->id?>"> <h1>{{ $post->title }}</h1></a>
            <h2>{{ $post->excerpt }}</h2>
            <p>{{ $post->body }}</p>
        </article>
    @endforeach
@endsection
