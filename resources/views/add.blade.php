@extends('layout')

@section('nav')

@endsection

@section('body')
<!--    --><?php //dd($author) ?>
    <br><br>
    <div>
        <form action="/add/save" method="POST">
            {{ csrf_field() }}
            <label for="title">Post Title</label>
            <input type="text" id="title" name="title"><br><br>
            <label for="excerpt">Post Excerpt:</label>
            <input type="text" id="excerpt" name="excerpt"><br><br>
            <label for="body">Post Body:</label>
            <textarea id="body" name="body" cols="50" rows="8"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
