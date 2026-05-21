<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'age' => 'required|numeric|min:18',
            'plan' => 'required',
            'goal' => 'required|min:10',
        ], [
            'name.required' => 'Full name is required.',
            'age.min' => 'You must be at least 18 years old.',
            'goal.min' => 'Fitness goal must be at least 10 characters.'
        ]);

        return redirect('/form')->with('success', 'Registration successful!');
    }
}