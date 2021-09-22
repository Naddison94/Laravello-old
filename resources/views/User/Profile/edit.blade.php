@extends('Component.layout')

@section('body')
    @auth()
        @if(auth()->user()->id == $user->id)
            <form action="/profile/edit/<?=auth()->user()->id?>/save" method="POST" enctype="multipart/form-data">
                @csrf
                <label>First name</label>
                <input type="text" value="{{ $user->userinformation->forename }}"><br>

                <label>Last name</label>
                <input type="text" value="{{ $user->userinformation->surname }}"><br>

                <label>Date of birth</label>
                <input type="text" value="{{ $user->userinformation->date_of_birth }}"><br>

                <label>Gender</label>
                <input type="text" value="{{ $user->userinformation->gender }}"><br>

                <label>Country</label>
                <input type="text" value="{{ $user->userinformation->country }}"><br>

                <label>Ethnicity</label>
                <input type="text" value="{{ $user->userinformation->ethnicity }}"><br>

                <br><br>
                <label for="avatar">Upload a profile image</label>
                <input type="file" id="avatar" name="avatar">
                <input type="submit" value="submit">
            </form>
        @endif
    @endauth
@endsection

