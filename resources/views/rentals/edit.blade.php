<!-- resources/views/rentals/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit rental')

@section('content')
<div class="container">
    <h1 class="my-4">Edit rental</h1>

    <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="start" class="form-label">Start Date and Time</label>
            <input type="datetime-local" name="start" class="form-control" id="start" required>
        </div>

        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" class="form-control" id="car_id" required>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $car->id == $rental->car_id ? 'selected' : '' }}>
                        {{ $car->make }} {{ $car->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $rental->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update rental</button>
    </form>
</div>
@endsection
