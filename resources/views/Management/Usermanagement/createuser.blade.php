@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <h2>Create User</h2>

    <form action="{{ route('user.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">User Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">User Password</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            @if ($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Admin</option>
                <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>User</option>
            </select>
            @if ($errors->has('role'))
                <div class="text-danger">{{ $errors->first('role') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="borrowing_limit" class="form-label">Borrowing Limit</label>
            <input type="number" name="borrowing_limit" class="form-control" value="{{ old('borrowing_limit', 10) }}">
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #4E9C84">Submit</button>
    </form>
</div>



@endsection