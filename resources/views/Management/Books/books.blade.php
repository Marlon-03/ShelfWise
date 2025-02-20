@extends('layouts.app')
@section('content')


<div class="w-100 my-4" style="background-color:#ECECEC;padding:30px;border-radius:20px">

    <h1 class="fs-2 fw-bold my-3">All Books</h1>

   
    <div class="book-grid">
        @foreach ($books as $book)
        <a href="{{ route('book.view', $book->id)}}" class="book">
            <!-- You can insert the book cover here -->
            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" style="height: 200px; width: 150px; object-fit: cover;">

    
            <div class="book-info">
                <h3 class="book-title">{{ $book->title }}</h3>
                <p class="book-author">{{ $book->author }}</p>
            </div>
    
        </a>
        @endforeach
    </div>
    

</div>





@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection