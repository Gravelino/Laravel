<!-- resources/views/feedbacks/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit feedback')

@section('content')
<div class="container">
    <h1 class="my-4">Edit feedback</h1>

    <form action="{{ route('feedbacks.update', $feedback->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="text" class="form-label">feedback Text</label>
            <textarea name="text" class="form-control" id="text" rows="4" required>{{ $feedback->text }}</textarea>
        </div>

        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" class="form-control" id="car_id" required>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $car->id == $feedback->car_id ? 'selected' : '' }}>
                        {{ $car->make }} {{ $car->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $feedback->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update feedback</button>
    </form>
</div>
@endsection
