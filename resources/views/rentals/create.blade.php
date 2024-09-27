<!-- resources/views/rentals/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add New rental')

@section('content')
<div class="container">
    <h1 class="my-4">Add New rental</h1>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="start" class="form-label">Start Date and Time</label>
            <input type="datetime-local" name="start" class="form-control" id="start" required>
        </div>



        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" class="form-control" id="car_id" required>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->make }} {{ $car->model }} {{ $car->year }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add rental</button>
    </form>
</div>
@endsection
