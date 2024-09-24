<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        return view('rentals.create');
    }

    public function store(StoreRentalRequest $request)
    {
        $validatedData = $request->validate([
            'start' => 'required',
        ]);

        Rental::create($validatedData);

        return redirect()->route('rentals.index')->with('success', 'rental created successfully!');
    }

    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        return view('rentals.show', compact('rental'));
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        return view('rentals.edit', compact('rental'));
    }

    public function update(UpdateRentalRequest $request, $id)
    {
        $validatedData = $request->validate([
            'start' => 'required',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update($validatedData);

        return redirect()->route('rentals.index')->with('success', 'rental updated successfully!');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'rental deleted successfully!');
    }
}
