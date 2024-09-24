<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $users = Feedback::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(StoreFeedbackRequest $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
        ]);

        Feedback::create($validatedData);

        return redirect()->route('feedbacks.index')->with('success', 'feedback created successfully!');
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.show', compact('feedback'));
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.edit', compact('feedback'));
    }

    public function update(UpdateFeedbackRequest $request, $id)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
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
