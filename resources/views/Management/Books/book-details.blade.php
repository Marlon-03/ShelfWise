@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <!-- Book Cover -->
                    <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" 
                        class="img-fluid rounded mb-3" 
                        style="height: 250px; width: 180px; object-fit: cover;">
                    
                    <!-- Book Details -->
                    <h4 class="fw-bold">{{ $book->title }}</h4>
                    <p class="text-muted">by {{ $book->author }}</p>
                    
                    <p class="small text-secondary"><strong>Description:</strong> {{ $book->description }}</p>
                    <p class="mb-1"><strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p class="mb-3"><strong>Available Copies:</strong> {{ $book->copies }}</p>

                    <!-- Borrow Button -->
                    <form method="POST" action="{{ route('book.borrow', $book->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary px-4" style="background-color:#4E9C84;">
                            📖 Borrow This Book
                        </button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
