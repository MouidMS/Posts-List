
@extends('layouts.main')

@section('title','Landpage')

@section('content')
    <h2>Show Post</h2>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title" readonly>
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea class="form-control" id="body" name="body" readonly>{{ $post->body }}</textarea>
    </div>
    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
    <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a class="btn btn-secondary" href="{{ route('posts.index') }}">Back to List</a>
@endsection
