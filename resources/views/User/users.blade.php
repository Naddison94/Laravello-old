@extends('Component.layout')

@section('body')
    @foreach($users as $user)
        <hr>
        <article>
            <h1>
                Username: {{ $user->username }}
            </h1>

            <p>
                Full name: {{ $user->forename }} {{ $user->surname }}
            </p>
        </article>
    @endforeach
@endsection
