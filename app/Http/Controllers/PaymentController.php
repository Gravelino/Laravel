<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\Rental;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $rentals = Rental::all();
        return view('payments.index', compact(['payments', 'rentals']));
    }

    public function create()
    {
        $rentals = Rental::all();
        return view('payments.create', compact('rentals'));
    }

    public function store(StorePaymentRequest $request)
    {
        $validatedData = $request->validate([
            'paymentMethod' => 'required|min:16|max:16',
            'amount' => 'required|numeric',
            'rental_id' => 'required'
        ]);

        Payment::create($validatedData);

        return redirect()->route('payments.index')->with('success', 'payment created successfully!');
    }

    public function show($id)
    {
        $payments = Payment::findOrFail($id);
        $rentals = Rental::all();
        return view('payments.show', compact(['payment', 'rentals']));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $rentals = Rental::all();
        return view('payments.edit', compact(['payment', 'rentals']));
    }

    public function update(UpdatePaymentRequest $request, $id)
    {
        $validatedData = $request->validate([
            'paymentMethod' => 'required|min:16|max:16',
            'amount' => 'required|numeric',
            'rental_id' => 'required'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validatedData);

        return redirect()->route('payments.index')->with('success', 'payment updated successfully!');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'payment deleted successfully!');
    }
}
