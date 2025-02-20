@extends('layouts.app')
@section('content')

<div class="d-flex flex-row">
    <h1  class="fs-1 fw-bold ">Borrowing History</h1>
    <a  href="{{ route('bbh.create')}}" class="addbtn ms-auto"type="submit">
        <i class="bi bi-plus-circle-fill mx-1"></i>
        Create New
    </a>
</div>
<div class="w-100 my-4" style="background-color:white;padding:30px;border-radius:20px">
    

    <h1 class="fs-2 fw-bold my-4">All Borrowing History</h1>
<table class="table  table-borderless">
    <thead>
        <colgroup>
            <col style="width: 5%">
            <col style="width: 15%">
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 10%">
            <col style="width: 20%">
        </colgroup>
        <tr class="text-center">
            <th>BBH ID</th>
            <th>User</th>
            <th>Book Title</th>
            <th>Borrowed Date</th>
            <th>Returned Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bbh as $bbh)
        <tr class="text-center">
            <td>{{ $bbh->id }}</td>
            <td>{{ $bbh->user->name }}</td> 
            <td>{{ $bbh->book->title }}</td>
            <td>{{ $bbh->borrow_date }}</td>
            <td>{{ $bbh->return_date }}</td>
            <td>{{ $bbh->borrow_status }}</td>

            <td>
                
                <a href="{{ route('bbh.edit', $bbh->id) }}"> 
                    <i class="bi bi-pencil-fill" style="color:#4E9C84;font-size:30px"></i>
                </a>
                <form action="{{ route('bbh.delete', $bbh->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> <i class="bi bi-trash-fill" style="color:#4E9C84;font-size:30px"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



{{--$bbh is a BorrowHistory record.
    $bbh->user is the user associated with that record.
    $bbh->user->name is the name of the user who made the borrowing represented by $bbh. 
--}}

@endsection