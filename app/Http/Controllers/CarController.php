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
            'make' => 'required|max:25',
            'model' => 'required|max:50',
            'year' => 'required|min:4|max:4',
            'location' => 'required|max:255',
            'isAvailable' => 'required',
            'imageUrl' => 'required',
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
            'location' => 'required|max:255',
            'isAvailable' => 'required',
            'imageUrl' => 'required',
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
