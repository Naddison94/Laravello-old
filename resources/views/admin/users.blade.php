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

            @if ($user->archived_by)
                {{ App\Models\User::where(['id' => $user->archived_by])->pluck('username')->first() }}<br>
            @endif

            @if (!App\Models\UserAdmin::where(['id' => $user->id])->where('archived', 0)->first())
                @if ($user->archived)
                    <p style="color:red">archived</p>
                    <form action="/admin/user/restore" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                        <input type="submit" value="restore">
                    </form>
                @else
                    <p style="color:green">live</p>
                    <form action="/admin/user/archive" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                        <input type="submit" value="Archive">
                    </form>
                @endif
            @endif
        </article>
    @endforeach
    <hr>
@endsection
