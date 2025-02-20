@extends('layouts.app')
@section('content')

<style>
    .img-thumbnail {
    width: 100px;
    height: auto;

    object-fit: cover;
}
</style>

<div class="d-flex flex-row">
    <h1  class="fs-1 fw-bold ">Book Management</h1>
    <a  href="{{ route('book.create')}}" class="addbtn ms-auto"type="submit">
        <i class="bi bi-plus-circle-fill mx-1"></i>
        Create New
    </a>
</div>

<div class="w-100 my-4" style="background-color:white;padding:30px;border-radius:20px">


    <h1 class="fs-2 fw-bold my-4">Books</h1>
    <table class="table  table-borderless">
        <colgroup>
            <col style="width: 5%">
            <col style="width: 10%">
            <col style="width: 15%">
            <col style="width: 15%">
            <col style="width: 20%">
            <col style="width: 10%">
            <col style="width: 10%">
            <col style="width: 15%">
        </colgroup>
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>ISBN</th>
                <th>No. of Copies</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr class="text-center">
                <td class="bookid">{{ $book->id }}</td>
                <td><img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="img-thumbnail"></td>
                <td class="booktitle">{{ $book->title }}</td>
                <td class="bookauthor">{{ $book->author }}</td>
                <td class="bookdescr">{{ $book->description }}</td>             
                <td class="bookisbn">{{ $book->isbn }}</td>
                <td class="bookcopies">{{ $book->copies }}</td>

                <td>

                    
                    <a href="{{ route('book.edit', $book->id) }}"> 
                        <i class="bi bi-pencil-fill" style="color:#4E9C84;font-size:30px"></i>
                    </a>
                    <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> <i class="bi bi-trash-fill" style="color:#4E9C84;font-size:30px"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection