@extends('layouts.app')

@section('title', 'payment Details')

@section('content')
    <div class="container">
        <h1>payment Details</h1>

        <p><strong>ID:</strong> {{ $payment->id }}</p>
        <p><strong>Payment Method:</strong> {{ $payment->paymentMethod }}</p>
        <p><strong>Amount:</strong> {{ $payment->amount }}</p>
        <p><strong>Rental:</strong> {{ $payment->user->name }} {{ $payment->user->surname }} {{ $payment->car->make }} {{ $payment->car->model }} {{ $payment->car->year }}</p>

        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
