@extends('layouts.main')

@section('title','Landpage')

@section('content')
    @csrf

    <h2>Create New Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">

            <input type="text" id="nameImage" name="nameImage" value="{{ old('nameImage') }}" />

        </div>

        <!-- Include the FilePond library -->
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

        <!-- Include any optional plugins -->
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

        <!-- Import FilePond styles -->
        <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">

        <!-- Initialize FilePond -->
        <script>
            const inputElement = document.querySelector('input[id="image"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                // Set the server to the POST route that handles file uploads
                server: {
                    process: {
                        url: '/posts/upload/image',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        withCredentials: false,
                        onload: (response) => {
                            // On successful upload, set the value of the hidden input field to the uploaded filename
                            document.getElementById('uploaded-image').value = response;
                            document.getElementById('nameImage').value = response;
                            console.log(response);
                            console.log(document.getElementById('nameImage').value);
                        },
                        onerror: (response) => {
                            console.log(response);
                        }
                    }
                }
            });

            // Add the image preview plugin to FilePond
            FilePond.registerPlugin(
                FilePondPluginImagePreview
            );
        </script>



        <!-- Add a hidden input field to store the uploaded filename -->
        <input type="hidden" id="uploaded-image" name="uploaded-image">

        <button type="submit" class="btn btn-success my-3">Submit</button>
    </form>

@endsection
