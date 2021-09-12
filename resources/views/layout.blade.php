<!DOCTYPE html>

<link rel="stylesheet" href="<?php resource_path()?>/app.css">
{{--<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">--}}
<title>Laravello</title>
<div class="nav">
    @yield('nav')
    <a class="navBtn" href="/">Home</a>
    <a class="navBtn" href="<?php resource_path()?>/posts">Posts</a>
    <a class="navBtn" href="<?php resource_path()?>/add">Add Post</a>
    <a class="navBtn" href="<?php resource_path()?>/add/category">Add Category</a>
    <a class="navBtn" href="<?php resource_path()?>/users">Users</a>

    @auth
        <span class="navBtn"> {{ auth()->user()->username }} is logged in</span>
        <a class="navBtn" href="<?php resource_path()?>/profile">profile</a>
        <form action="/logout" method="POST">
            @csrf
            <input type="submit" value="logout">
        </form>
    @else
        <a class="navBtn" href="<?php resource_path()?>/registration">Registration</a>
        <a class="navBtn" href="<?php resource_path()?>/login">Log in</a>
    @endauth
</div>

<header>
    @yield('header'){{--later make a compontent header that incorporates a logo etc, maybe put the nav in there--}}
</header>

<body>
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @yield('body')
</body>

<footer class="center">
    @yield('footer')
    @if (session()->has('success'))
        <div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</footer>
