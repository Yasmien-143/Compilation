<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    // Show all habits (index)
    public function index(Request $request)
    {
        $search = $request->search;

        $habits = Habit::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%");
        })->latest()->paginate(5);

        return view('habits.index', compact('habits', 'search'));
    }

    // Show create form with existing habits
   public function create(Request $request)
{
    $search = $request->search;

    $habits = Habit::when($search, function ($query) use ($search) {
        return $query->where('name', 'like', "%$search%");
    })->latest()->paginate(5); // <-- paginate instead of get()

    return view('habits.create', compact('habits', 'search'));
}

    // Store new habit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'goal' => 'required|integer',
            'start_date' => 'required|date'
        ]);

        Habit::create([
            'name' => $request->name,
            'category' => $request->category,
            'goal' => $request->goal,
            'progress' => 0, // start at 0
            'start_date' => $request->start_date
        ]);

        return redirect()->route('habits.create')->with('success', 'Habit Added!');
    }

    // Show habit details
    public function show(Habit $habit)
    {
        return view('habits.show', compact('habit'));
    }

    // Show edit form
    public function edit(Habit $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    // Update habit
    public function update(Request $request, Habit $habit)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'goal' => 'required|integer',
            'progress' => 'required|integer',
            'start_date' => 'required|date'
        ]);

        $habit->update($request->all());

        return redirect()->route('habits.index')->with('success', 'Habit Updated!');
    }

    // Delete habit
    public function destroy(Habit $habit)
    {
        $habit->delete();
        return back()->with('success', 'Habit Deleted!');
    }

    // Mark habit as done (delete)
    public function done(Habit $habit)
    {
        $habit->delete();
        return back()->with('success', 'Habit Completed!');
    }
}