<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        $users = User::all();
        $cars = Car::all();
        return view('rentals.index', compact(['rentals', 'users', 'cars']));
    }

    public function create()
    {
        $users = User::all();
        $cars = Car::all();
        return view('rentals.create', compact(['users', 'cars']));
    }

    public function store(StoreRentalRequest $request)
    {
        $validatedData = $request->validate([
            'start' => 'required',
            'end' => 'nullable',
            'user_id' => 'required',
            'car_id' => 'required',
        ]);

        Rental::create($validatedData);

        return redirect()->route('rentals.index')->with('success', 'rental created successfully!');
    }

    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        $users = User::all();
        $cars = Car::all();
        return view('rentals.show', compact(['rental', 'users', 'cars']));
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $users = User::all();
        $cars = Car::all();
        return view('rentals.edit', compact(['rental', 'users', 'cars']));
    }

    public function update(UpdateRentalRequest $request, $id)
    {
        $validatedData = $request->validate([
            'start' => 'required',
            'end' => 'nullable',
            'user_id' => 'required',
            'car_id' => 'required',
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
