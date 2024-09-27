@extends('layouts.app')

@section('title', 'Feedback Details')

@section('content')
    <div class="container">
        <h1>Feedback Details</h1>

        <p><strong>ID:</strong> {{ $feedback->id }}</p>
        <p><strong>Text:</strong> {{ $feedback->text }}</p>
        <p><strong>Likes:</strong> {{ $feedback->likes }}</p>
        <p><strong>Dislikes:</strong> {{ $feedback->dislikes }}</p>
        <p><strong>User:</strong> {{ $feedback->user->name }} {{ $feedback->user->surname }}</p>
        <p><strong>Car:</strong> {{ $feedback->car->make }} {{ $feedback->car->model }} {{ $feedback->car->year }}</p>

        <a href="{{ route('feedbacks.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('feedbacks.edit', $feedback->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
