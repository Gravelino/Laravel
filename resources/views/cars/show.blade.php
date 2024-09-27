@extends('layouts.app')

@section('title', 'Car Details')

@section('content')
    <div class="container">
        <h1>Car Details</h1>

        <p><strong>ID:</strong> {{ $car->id }}</p>
        <p><strong>Make:</strong> {{ $car->make }}</p>
        <p><strong>Model:</strong> {{ $car->model }}</p>
        <p><strong>Year:</strong> {{ $car->year }}</p>
        <p><strong>Location:</strong> {{ $car->location }}</p>
        <p><strong>Is Available:</strong> {{ $car->isAvailable }}</p>
        <p><strong>Cost Per Hour:</strong> {{ $car->costPerHour }}</p>
        <p><strong>Image:</strong> <img src="{{ $car->imageUrl }}" alt="Car Image" class="img-thumbnail" style="width: 200px;"></p>
        

        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection