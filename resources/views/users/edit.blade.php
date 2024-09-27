@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ $user->surname }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ $user->phoneNumber }}" required>
            </div>
            <div class="mb-3">
                <label for="isAdmin" class="form-label">Is Admin</label>
                <select name="isAdmin" id="isAdmin" class="form-control">
                    <option value="0" {{ $user->isAdmin == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $user->isAdmin == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
