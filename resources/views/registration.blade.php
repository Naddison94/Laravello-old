@extends('layout')

@section('nav')

@endsection

@section('body')


    <form action="/registration/save" method="POST"><br><br><br><br>
        @csrf
        <label for="username">Username</label>
        <input type="text" id="username" value="{{ old('username') }}" name="username"><br><br>
{{--        @error('username')--}}
{{--        {{ $message }}--}}
{{--        @enderror--}}
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Submit">
    </form>
@endsection
