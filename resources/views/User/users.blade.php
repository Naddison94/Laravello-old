@extends('Component.layout')

@section('body')
    @foreach($users as $user)
        <hr>
        <article>
            <h1>
                Username: {{ $user->username }}
            </h1>

            <p>
                Full name: {{ $user->userInformation->forename }} {{ $user->userInformation->surname }}
            </p>

            @if ($user->admin) This user is an admin @endif
        </article>
    @endforeach
@endsection
