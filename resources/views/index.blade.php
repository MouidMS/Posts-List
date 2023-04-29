@extends('layouts.main')

@section('title','Landpage')

@section('content')

    <h2>Posts List</h2>
    <p>Welcome {{\Illuminate\Support\Facades\Auth::user()->name}} to your list 😊 </p>
    <h1>{{ ('welcome') }}</h1>

    <a class="btn btn-danger" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="btn btn-success" href="{{ route('posts.create') }}">Create New Post</a>
    <a class="btn btn-warning" href="{{ route('posts.trashed') }}">View Trashed Posts</a>
    <a href="{{ route('posts.destroy-all') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-all-form').submit();">
        Delete All Posts
    </a>

    <form id="delete-all-form" action="{{ route('posts.destroy-all') }}" method="POST" style="display: none;">
        @csrf
        @method('delete')
    </form>
    <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th>Image</th>
            <th>Created_at</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <tr>

                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        @if($post->image)
{{--                            <img src="{{ asset("uploads/images/$post->user_id/$post->image") }}" alt="Post Image" style="max-width:100px; max-height:100px;">--}}
                            <img src="{{ Storage::disk('s3')->url("images/$post->user_id/$post->image") }}" alt="Post Image" style="max-width:100px; max-height:100px;">

                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>

                    <td>
                        <form action="{{ route('posts.destroy', $post->uuid) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('posts.show', $post->uuid) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('posts.edit', $post->uuid) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No posts found.</td>
            </tr>
        @endif
        </tbody>
    </table>

    <div class="d-flex">
        {!! $posts->links() !!}
    </div>

    <br><br>
@endsection
