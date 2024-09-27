<!-- resources/views/payments/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit payment')

@section('content')
<div class="container">
    <h1 class="my-4">Edit payment</h1>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="paymentMethod" class="form-label">Paymet Method</label>
            <input type="text" name="paymentMethod" id="paymentMethod" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" id="amount" required>
        </div>

        <div class="mb-3">
            <label for="rental_id" class="form-label">Rental</label>
            <select name="rental_id" class="form-control" id="rental_id" required>
                @foreach ($rentals as $rental)
                    <option value="{{ $rental->id }}">{{$rental->user->name}} {{ $rental->user->surname }} {{ $rental->car->make }} {{ $rental->car->model }} {{ $rental->car->year }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update payment</button>
    </form>
</div>
@endsection
