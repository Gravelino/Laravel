<!-- resources/views/cars/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Car')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Car</h1>

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" name="make" class="form-control" id="make" value="{{ $car->make }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" id="model" value="{{ $car->model }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" id="year" value="{{ $car->year }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location" value="{{ $car->location }}" required>
        </div>

        <div class="mb-3">
            <label for="isAvailable" class="form-label">Is Available</label>
            <select name="isAvailable" class="form-control" id="isAvailable" required>
                <option value="1" {{ $car->isAvailable ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$car->isAvailable ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="imageUrl" class="form-label">Image URL</label>
            <input type="text" name="imageUrl" class="form-control" id="imageUrl" value="{{ $car->imageUrl }}">
        </div>

        <div class="mb-3">
            <label for="costPerHour" class="form-label">Cost Per Hour</label>
            <input type="number" name="costPerHour" class="form-control" id="costPerHour" value="{{ $car->costPerHour }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Car</button>
    </form>
</div>
@endsection
