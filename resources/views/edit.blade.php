<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body">{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>
