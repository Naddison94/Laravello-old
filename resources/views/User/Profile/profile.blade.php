@extends('Component.layout')

@section('body')
    <div>
        @if($user->userInformation->avatar)
            <img class="profile-image" src="/user/{{ $user->id }}/avatar/{{ $user->userInformation->avatar }}">
        @else
            <img class="profile-image" src="/img/default_image.jpg">
        @endif


        <label>{{ $user->username }}</label><br>

            @if ($user->recent_activity)
                Last active: {{ $user->recent_activity }}<br>
            @endif
    </div>

    <br><br>

    <div>
        <h4>Recent Comments:</h4>
        @foreach($user->comments as $userComment)
            <div>
                Post Title: {{ App\Models\Post::where('id', $userComment->post_id)->pluck('title')->first() }} <br>
                Comment: {{ $userComment->comment }}
            </div> <hr>
        @endforeach
    </div>
@endsection
