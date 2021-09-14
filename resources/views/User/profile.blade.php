@extends('Comonent.layout')

@section('body')
    @auth()
    <form action="/user/<?=auth()->user()->id?>/upload/profile-image" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Upload a profile image</label>
        <input type="file" id="image" name="image">
        <input type="submit" value="submit">
    </form>
    @endauth

    @if($user->img)
        <img src="/user/{{ $user->id }}/profileImg/{{ $user->img }}">
    @else
        <img src="/uploads/default_img.jpg">
    @endif
@endsection

