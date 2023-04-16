
@extends('layouts.main')

@section('title','Landpage')

@section('content')

    <h2>Create New Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-success my-3">Submit</button>
    </form>
@endsection
