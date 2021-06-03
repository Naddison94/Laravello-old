@extends('layout')

@section('nav')

@endsection

@section('body')
    <div>
        <form action="/post/<?= $id ?>/delete/archive" method="POST" >
            @csrf
            <h3>
                Delete Post
            </h3>

            <hr>

            <label>To confirm deletion, click submit</label><br>
            @isset($post) <input type="hidden" name="post_id" value="<?= $id ?>"> @endisset
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
