@extends('layouts.app')


@section('content')
<div class="container mx-5">
    <h2>Add Book</h2>

    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Book Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
            @if ($errors->has('author'))
                <div class="text-danger">{{ $errors->first('author') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="number" name="isbn" class="form-control" value="{{ old('isbn') }}">
            @if ($errors->has('isbn'))
                <div class="text-danger">{{ $errors->first('isbn') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="copies" class="form-label">Number of Copies</label>
            <input type="number" name="copies" class="form-control" value="{{ old('copies') }}">
            @if ($errors->has('copies'))
                <div class="text-danger">{{ $errors->first('copies') }}</div>
            @endif
        </div>


        <div class="mb-3">
            <label for="cover" class="form-label">Book Cover</label>
            <div id="imagePreview" style="max-width: 200px; margin-bottom: 10px;">    
            </div>      
            <input type="file" name="cover" class="form-control" id="coverInput">      
            @if ($errors->has('cover'))
                <div class="text-danger">{{ $errors->first('cover') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #4E9C84">Submit</button>
    </form>
</div>

<script>
    // JavaScript for displaying image preview
    document.getElementById('coverInput').addEventListener('change', function(event) {
        // Get the file input element
        const file = event.target.files[0];

        // Check if a file is selected
        if (file) {
            const reader = new FileReader();

            // Set the onload event to display the image
            reader.onload = function(e) {
                const imgPreview = document.getElementById('imagePreview');
                imgPreview.innerHTML = `<img src="${e.target.result}" alt="Cover Preview" class="img-fluid" style="max-width: 200px;">`;
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    });
</script>


@endsection
