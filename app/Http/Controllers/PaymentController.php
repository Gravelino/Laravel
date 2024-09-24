<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(StorePaymentRequest $request)
    {
        $validatedData = $request->validate([
            'paymentMethod' => 'required',
        ]);

        Payment::create($validatedData);

        return redirect()->route('payments.index')->with('success', 'payment created successfully!');
    }

    public function show($id)
    {
        $payments = Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    public function update(UpdatePaymentRequest $request, $id)
    {
        $validatedData = $request->validate([
            'paymentMethod' => 'required',
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
