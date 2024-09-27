<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

@section('title', 'Cars')

@section('content')
    <h1>Car List</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Create New Car</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Location</th>
                <th>Is Available</th>
                <th>Cost Per Hour</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->make }}</td>
                    <td> {{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->location }}</td>
                    <td>{{ $car->isAvailable ? 'Yes' : 'No' }}</td>
                    <td>{{ $car->costPerHour }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
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