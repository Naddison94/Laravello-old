@extends('Component.layout')

@section('body')
    @auth()
        @if(auth()->user()->id == $user->id)
            <form action="/profile/edit/<?=auth()->user()->id?>/save" method="POST" enctype="multipart/form-data">
                @csrf
                <label>First name
                    <input type="text" id="forename" name="forename" value="{{ $user->userinformation->forename }}">
                </label><br>

                <label>Last name</label>
                <input type="text" id="surname" name="surname" value="{{ $user->userinformation->surname }}"><br>

                <label>Date of birth</label>
                <input type="text" id="date_of_birth" name="date_of_birth" value="{{ $user->userinformation->date_of_birth }}"><br>

                <label>Gender</label>
                <input type="text" id="gender" name="gender" value="{{ $user->userinformation->gender }}"><br>

                <label>Country</label>
                <input type="text" id="country" name="country" value="{{ $user->userinformation->country }}"><br>

                <label>Ethnicity</label>
                <input type="text" id="ethnicity" name="ethnicity" value="{{ $user->userinformation->ethnicity }}"><br>

                <br><br>
                <label for="avatar">Upload a profile image</label>
                <input type="file" id="avatar" name="avatar">
                <input type="submit" value="submit">
            </form>
        @endif
    @endauth
@endsection

