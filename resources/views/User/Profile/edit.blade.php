@extends('Component.layout')

@section('body')
    @auth()
        @if(auth()->user()->id == $user->id)
            <form action="/profile/edit/<?=auth()->user()->id?>/save" method="POST" enctype="multipart/form-data">
                @csrf
                <label>First name</label>
                <input type="text"><br>
                <label>Last name</label>
                <input type="text"><br>
                <label>E-mail</label>
                <input type="text"><br>

                <br><br>

                <label for="image">Upload a profile image</label>
                <input type="file" id="image" name="image">
                <input type="submit" value="submit">
            </form>
        @endif
    @endauth
@endsection

