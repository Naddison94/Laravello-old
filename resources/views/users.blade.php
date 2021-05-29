@extends('layout')

@section('nav')

@endsection

@section('body')
    @foreach($users as $user)
        <article>
            <h1>
                {{ $user->name }}
            </h1>

            <p>
                {{ $user->email }}
            </p>
        </article>
    @endforeach
@endsection
