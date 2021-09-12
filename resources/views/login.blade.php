@extends('layout')

@section('nav')

@endsection

@section('body')
    <form action="/login/user" method="POST"><br><br><br><br>
        @csrf
        <label for="username">Username</label>
        <input type="text" id="username" name="username"><br><br>
{{--        OR<br><br>--}}
{{--        <label for="email">Email</label>--}}
{{--        <input type="email" id="email" name="email"><br><br>--}}

        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Submit">
    </form>
@endsection
