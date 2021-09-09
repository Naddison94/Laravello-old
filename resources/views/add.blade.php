@extends('layout')

@section('nav')

@endsection

@section('body')
<!--show categories, later put them in a drop down to assign to added post-->
<?php //dd($category) ?>

@if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@isset($success_message)
    <div>
        <label><?=$success_message?></label>
    </div>
@endisset

<div>
@isset($category)
    <br><br>
    <form action="/add/save/category" method="POST">
        @csrf
        <h3>
            Add a new category
        </h3>

        <hr>

        <label for="title">Category Title</label>
        <input type="text" id="title" name="title"><br><br>
        <input type="submit" value="Submit">
    </form>
@endisset

@isset($categories)
<br><br>

<form action="/add/save/post" method="POST" enctype="multipart/form-data">
    @csrf
    <h3>
        Current categories
    </h3>

    <label for="category_id">Select a category for this post</label>
    <select id="category_id" name="category_id">
        @foreach($categories as $category)
                <option value="<?= $category->id ?>"><?= $category->title ?></option>
        @endforeach
    </select>
    <hr>

    <label for="title">Post Title</label>
    <input type="text" id="title" name="title"><br><br>
    <label for="excerpt">Post Excerpt:</label>
    <input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt') }}"><br><br>
    <label for="body">Post Body:</label>
    <textarea id="body" name="body" cols="50" rows="8" >{{ old('body') }}</textarea><br><br>
    <label for="image">Select image:</label>
    <input type="file" id="image" name="image"><br><br>
    <input type="submit" value="Submit">
</form>
@endisset
</div>
@endsection
