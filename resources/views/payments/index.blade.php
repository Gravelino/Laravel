<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')



@section('content')
    <h1>payment List</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">Create New payment</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Payment method</th>
                <th>Amount</th>
                <th>Rental</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->paymentMethod }}</td>
                    <td> {{ $payment->amount }}</td>
                    <td>{{ $payment->rental->user->name }} {{ $payment->rental->user->surname }}</td>
                    <td>{{ $payment->rental->car->make }} {{ $payment->rental->car->model }} {{ $payment->rental->car->year }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline-block;">
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
