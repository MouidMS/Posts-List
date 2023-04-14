<!DOCTYPE html>
<html>
<head>
    <title>Posts List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Posts List</h2>
    <p>Welcome {{\Illuminate\Support\Facades\Auth::user()->name}} to your list </p>
    <h1>{{ trans('welcome') }}</h1>

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
            <th>Created_at</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
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
</div>

</body>
</html>
