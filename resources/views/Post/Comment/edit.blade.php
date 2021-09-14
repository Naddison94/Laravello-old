@extends('Component.layout')

@section('body')
    @isset($comment)
        <div>
            <form action="/comment/{{ $comment->id }}/edit/save" method="POST">
                @csrf
                <label for="comment">Edit your comment</label><br>
                <textarea id="comment" name="comment" cols="50" rows="8">{{ $comment->comment }}</textarea><br>
                <input type="submit" value="Update">
            </form>
        </div>
    @endisset
@endsection
