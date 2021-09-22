@extends('Component.layout')

@section('body')
    <div>
        @if($user->userInformation->avatar)
            <img class="profile-image" src="/user/{{ $user->id }}/profileImg/{{ $user->userInformation->avatar }}">
        @else
            <img class="profile-image" src="/uploads/default_image.jpg">
        @endif

        <label>{{ $user->username }}</label>
    </div>
@endsection
