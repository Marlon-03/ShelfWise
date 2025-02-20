@extends('layouts.app')

@section('content')
<div class="container mx-5">
    <h2>Edit Book</h2>

    <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}">
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Book Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
            @if ($errors->has('author'))
                <div class="text-danger">{{ $errors->first('author') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $book->description) }}">
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="number" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}">
            @if ($errors->has('isbn'))
                <div class="text-danger">{{ $errors->first('isbn') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="copies" class="form-label">Number of Copies</label>
            <input type="number" name="copies" class="form-control" value="{{ old('copies', $book->copies) }}">
            @if ($errors->has('copies'))
                <div class="text-danger">{{ $errors->first('copies') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Book Cover</label>
            @if ($book->cover)
                <div>
                    <img src="{{ asset('storage/' . $book->cover) }}" alt="Current Cover" class="img-fluid" style="max-width: 200px; margin-bottom: 10px;">
                </div>
            @endif
            <input type="file" name="cover" class="form-control">
            @if ($errors->has('cover'))
                <div class="text-danger">{{ $errors->first('cover') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary" style="background-color:#4E9C84;">Update Book</button>
    </form>
</div>
@endsection
