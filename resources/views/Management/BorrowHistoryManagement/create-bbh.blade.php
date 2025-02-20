@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Borrow a Book</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('bbh.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">ID of Borrower</label>
                            <input type="number" name="borrower" class="form-control" placeholder="Enter borrower ID">
                            @error('borrower')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID of Book Borrowed</label>
                            <input type="number" name="bookborrowed" class="form-control" placeholder="Enter book ID">
                            @error('bookborrowed')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date Borrowed</label>
                            <input type="date" name="dateborrowed" class="form-control">
                            @error('dateborrowed')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date Returned</label>
                            <input type="date" name="datereturned" class="form-control">
                            @error('datereturned')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Borrow Status</label>
                            <select name="borrowstatus" class="form-select">
                                <option value="borrowed">Borrowed</option>
                                <option value="returned">Returned</option>
                            </select>
                            @error('borrowstatus')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" style="background-color:#4E9C84;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <strong>There were some errors:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
