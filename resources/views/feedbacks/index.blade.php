<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')



@section('content')
    <h1>Feedback List</h1>
    <a href="{{ route('feedbacks.create') }}" class="btn btn-primary">Create New Feedback</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Text</th>
                <th>likes</th>
                <th>dislikes</th>
                <th>User</th>
                <th>Car</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->text }}</td>
                    <td> {{ $feedback->likes }}</td>
                    <td>{{ $feedback->dislikes }}</td>
                    <td>{{ $feedback->user->name }} {{ $feedback->user->surname }}</td>
                    <td>{{ $feedback->car->make }} {{ $feedback->car->model }} {{ $feedback->car->year }}</td>
                    <td>
                        <a href="{{ route('feedbacks.show', $feedback->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('feedbacks.edit', $feedback->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST" style="display:inline-block;">
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
