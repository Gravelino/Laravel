@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Surname:</strong> {{ $user->surname }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone Number:</strong> {{ $user->phoneNumber }}</p>
        <p><strong>Is Admin:</strong> {{ $user->isAdmin ? 'Yes' : 'No' }}</p>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
