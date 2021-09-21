@extends('Component.layout')

@section('body')
    <div>
        @if($user->img)
            <img class="profile-image" src="/user/{{ $user->id }}/profileImg/{{ $user->img }}">
        @else
            <img class="profile-image" src="/uploads/default_image.jpg">
        @endif

        <label>{{ $user->username }}</label>
    </div>

@endsection

