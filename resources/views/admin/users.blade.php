@extends('Component.layout')

@section('body')
    @foreach($users as $user)
        <hr>
        <article>
            <h1>
                Username: {{ $user->username }} |
                @if ($user->admin) Admin @else User @endif
            </h1>

            <p>
                Full name: {{ $user->userInformation->forename }} {{ $user->userInformation->surname }}
            </p>


                Last logged in:
                @if ($user->userInformation->last_login_date)
                    {{ $user->userInformation->last_login_date->diffForHumans() }}<br>
                @else
                    No recorded activity <br>
                @endif



                Last logged out:
                @if ($user->userInformation->last_logout_date)
                    {{ $user->userInformation->last_logout_date->diffForHumans() }}<br>
                @else
                    No recorded activity <br>
                @endif
        </article>

        <form action="/admin/user/archive">
            
        </form>
    @endforeach
    <hr>
@endsection
