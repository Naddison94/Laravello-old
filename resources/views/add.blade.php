@extends('layout')

@section('nav')

@endsection

@section('body')
<!--show categories, later put them in a drop down to assign to added post-->
    <br><br>
    <div>
        <form action="/add/save" method="POST" enctype="multipart/form-data">

            @csrf
            <h3>
                Current categories
            </h3>

            @foreach($categories as $category)
                <label for="category_id">&bull; <?=$category->title?></label>
                <input type="radio" id="category_id" name="category_id" value="<?= $category->id ?>"><br>
            @endforeach

            <hr>

            <label for="title">Post Title</label>
            <input type="text" id="title" name="title"><br><br>
            <label for="excerpt">Post Excerpt:</label>
            <input type="text" id="excerpt" name="excerpt"><br><br>
            <label for="body">Post Body:</label>
            <textarea id="body" name="body" cols="50" rows="8"></textarea><br><br>
            <label for="image">Select image:</label>
            <input type="file" id="image" name="image"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection