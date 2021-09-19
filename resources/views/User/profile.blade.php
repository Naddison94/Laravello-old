@extends('Component.layout')

@section('body')
    @auth()
        @if(auth()->user()->id == $user->id)
            <form action="/user/<?=auth()->user()->id?>/upload/profile-image" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="image">Upload a profile image</label>
                <input type="file" id="image" name="image">
                <input type="submit" value="submit">
            </form>
        @endif
    @endauth
    <div>
    @if($user->img)
        <img class="profile-image" src="/user/{{ $user->id }}/profileImg/{{ $user->img }}">
    @else
        <img class="profile-image" src="/uploads/default_image.jpg">
    @endif
    </div>
@endsection

