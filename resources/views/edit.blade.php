@extends('layout')

@section('nav')

@endsection

@section('body')

<div>
    <form action="/post/{id}/edit/save" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>
            Edit category
        </h3>

        <hr>

        <label for="title">Post Title</label>
        <input type="text" id="title" name="title"><br><br>
        <label for="excerpt">Post Excerpt:</label>
        <input type="text" id="excerpt" name="excerpt"><br><br>
        <label for="body">Post Body:</label>
        <textarea id="body" name="body" cols="50" rows="8"></textarea><br><br>
        <label for="image">Select image:</label>
        <input type="file" id="image" name="image"><br><br>

        @isset($post) <input type="hidden" name="post_id" value="<?= $id ?>"> @endisset
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
