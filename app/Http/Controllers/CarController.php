<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(StoreCarRequest $request)
    {
        $validatedData = $request->validate([
            'costPerHour' => 'required',
        ]);

        Car::create($validatedData);

        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(UpdateCarRequest $request, $id)
    {
        $validatedData = $request->validate([
            'costPerHour' => 'required',
        ]);

        $car = Car::findOrFail($id);
        $car->update($validatedData);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
