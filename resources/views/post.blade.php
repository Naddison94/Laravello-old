@extends('layout')

@section('nav')

@endsection

@section('body')
        <article>
            <h1>{{ $post->title }}</h1>
            <h2>{{ $post->excerpt }}</h2>
            <p>{{ $post->body }}</p>
        </article>
@endsection

