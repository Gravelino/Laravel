<!-- resources/views/cars/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add New Car')

@section('content')
<div class="container">
    <h1 class="my-4">Add New Car</h1>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" name="make" class="form-control" id="make" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" id="model" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" id="year" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location" required>
        </div>

        <div class="mb-3">
            <label for="isAvailable" class="form-label">Is Available</label>
            <select name="isAvailable" class="form-control" id="isAvailable" required>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="imageUrl" class="form-label">Image URL</label>
            <input type="text" name="imageUrl" class="form-control" id="imageUrl">
        </div>

        <div class="mb-3">
            <label for="costPerHour" class="form-label">Cost Per Hour</label>
            <input type="number" name="costPerHour" class="form-control" id="costPerHour" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
</div>
@endsection
