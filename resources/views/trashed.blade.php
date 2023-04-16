
@extends('layouts.main')

@section('title','Landpage')

@section('content')
    <h2>Trashed Posts List</h2>
    <p>Welcome {{\Illuminate\Support\Facades\Auth::user()->name}} to your trashed posts list </p>
    <a class="btn btn-danger" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <a class="btn btn-success" href="{{ route('posts.index') }}">Posts</a>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th>Deleted_at</th>

            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($trashedPosts->count() > 0)
            @foreach ($trashedPosts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->deleted_at->diffForHumans() }}</td>

                    <td>
                        <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Restore</button>
                        </form>
                        <form action="{{ route('posts.force-delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Permanently</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No trashed posts found.</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
