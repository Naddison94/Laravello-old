@extends('Component.layout')

@section('body')
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
</div>
@endsection
