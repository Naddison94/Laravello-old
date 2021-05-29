<!DOCTYPE html>

<link rel="stylesheet" href="<?php resource_path()?>/app.css">
<title>Laravello</title>

<div class="nav">
    @yield('nav')
    <a class="navBtn" href="/">Home</a> |
    <a class="navBtn" href="<?php resource_path()?>/posts">Posts</a> |
    <a class="navBtn" href="<?php resource_path()?>/users">Users</a> |
    <a class="navBtn" href="<?php resource_path()?>/users">Kek</a> |
    <a class="navBtn" href="<?php resource_path()?>/users">Bois</a>
</div>

<div></div>
<header>
    @yield('header'){{--later make a compontent header that incorporates a logo etc, maybe put the nav in there--}}
</header>

<body >
    @yield('body')
</body>


<footer class="center">
    @yield('footer')
</footer>
