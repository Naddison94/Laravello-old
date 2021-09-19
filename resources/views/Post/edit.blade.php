@extends('Component.layout')

@section('body')

<div>
    <form action="/post/{id}/edit/save" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>
            Edit Post
        </h3>

        <hr>

        <label for="category_id">Select a category for this post</label>
        <select id="category_id" name="category_id">
            <option value="<?= $post->category->id ?>"><?= $post->category->title ?></option>
            @foreach($categories as $category)
                @if($category->id != $post->category->id)
                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                @endif
            @endforeach
        </select> <br><br>

        <label for="title">Post Title</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}"><br><br>
        <label for="excerpt">Post Excerpt:</label>
        <input type="text" id="excerpt" name="excerpt" value="{{ $post->excerpt }}"><br><br>
        <label for="body">Post Body:</label>
        <textarea id="body" name="body" cols="50" rows="8">{{ $post->body }}</textarea><br><br>
        <label for="image">Select image:</label>
        <input type="file" id="image" name="image"><br><br>

        @isset($post) <input type="hidden" name="post_id" value="<?= $post->id ?>"> @endisset
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
