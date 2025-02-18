@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <h2>Edit User</h2>

    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')  <!-- This is important for updating resources in RESTful routes -->

        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">User Email</label>
            <textarea name="email" rows="3" class="form-control">{{ old('email', $user->email) }}</textarea>
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Admin</option>
                <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>User</option>
            </select>
            @if ($errors->has('role'))
                <div class="text-danger">{{ $errors->first('role') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="borrowing_limit" class="form-label">Borrowing Limit</label>
            <input type="number" name="borrowing_limit" class="form-control" value="{{ old('borrowing_limit', $user->borrowing_limit) }}">
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #4E9C84">Update</button>
    </form>
</div>

@endsection