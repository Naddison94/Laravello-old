@extends('Component.layout')

@section('nav')

@endsection

@section('body')
    <form action="/login/user" method="POST"><br><br><br><br>
        @csrf
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}"><br><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Submit">
    </form>
@endsection
