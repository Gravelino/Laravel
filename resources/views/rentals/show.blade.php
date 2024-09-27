@extends('layouts.app')

@section('title', 'rental Details')

@section('content')
    <div class="container">
        <h1>rental Details</h1>

        <p><strong>ID:</strong> {{ $rental->id }}</p>
        <p><strong>Start time:</strong> {{ $rental->start }}</p>
        <p><strong>End time:</strong> {{ $rental->end }}</p>
        <p><strong>User:</strong> {{ $rental->user->name }} {{ $rental->user->surname }}</p>
        <p><strong>Car:</strong> {{ $rental->car->make }} {{ $rental->car->model }} {{ $rental->car->year }}</p>

        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
