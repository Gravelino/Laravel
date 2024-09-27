<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\Car;
use App\Models\User;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::all();
        
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        $cars = Car::all();
        $users = User::all();

        return view('feedbacks.create', compact(['cars', 'users']));
    }

    public function store(StoreFeedbackRequest $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
            'likes' => 'nullable:integer',
            'dislikes' => 'nullable:integer',
            'car_id' => 'required',
            'user_id' => 'required',
        ]);

        Feedback::create($validatedData);

        return redirect()->route('feedbacks.index')->with('success', 'feedback created successfully!');
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        $cars = Car::all();
        $users = User::all();

        return view('feedbacks.show', compact(['feedback', 'cars', 'users']));
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        $cars = Car::all();
        $users = User::all();

        return view('feedbacks.edit', compact(['feedback', 'cars', 'users']));
    }

    public function update(UpdateFeedbackRequest $request, $id)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
            'likes' => 'nullable:integer',
            'dislikes' => 'nullable:integer',
            'car_id' => 'required',
            'user_id' => 'required',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($validatedData);

        return redirect()->route('feedbacks.index')->with('success', 'Feedback updated successfully!');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted successfully!');
    }
}
