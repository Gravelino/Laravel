<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')



@section('content')
    <h1>rental List</h1>
    <a href="{{ route('rentals.create') }}" class="btn btn-primary">Create New rental</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Start time</th>
                <th>End time</th>
                <th>User</th>
                <th>Car</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->start }}</td>
                    <td> {{ $rental->end }}</td>
                    <td>{{ $rental->user->name }} {{ $rental->user->surname }}</td>
                    <td>{{ $rental->car->make }} {{ $rental->car->model }} {{ $rental->car->year }}</td>
                    <td>
                        <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
