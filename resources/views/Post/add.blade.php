@extends('Component.layout')

@section('body')
<div>
@isset($categories)
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
