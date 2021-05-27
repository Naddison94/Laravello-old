<!DOCTYPE html>

<link rel="stylesheet" href="app.css">
<title>Laravello</title>
<header>
    @yield('header'){{--later make a compontent header that incorporates a logo etc, maybe put the nav in there--}}
</header>

<div>
    @yield('nav')
    <a href="/">Home | </a>
    <a href="<?php resource_path()?>/posts">Posts</a>
    <a href="<?php resource_path()?>/users">Users</a>
</div>

<body>
    @yield('body')
</body>


<footer class="center">
    @yield('footer')
</footer>
