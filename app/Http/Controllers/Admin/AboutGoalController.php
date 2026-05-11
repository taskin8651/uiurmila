<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutGoal;
use Illuminate\Http\Request;

class AboutGoalController extends Controller
{
    public function index()
    {
        $aboutGoals = AboutGoal::orderBy('sort_order')->get();

        return view('admin.aboutGoals.index', compact('aboutGoals'));
    }

    public function create()
    {
        return view('admin.aboutGoals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        AboutGoal::create($data);

        return redirect()->route('admin.about-goals.index')->with('success', 'Goal created successfully.');
    }

    public function show(AboutGoal $aboutGoal)
    {
        return view('admin.aboutGoals.show', compact('aboutGoal'));
    }

    public function edit(AboutGoal $aboutGoal)
    {
        return view('admin.aboutGoals.edit', compact('aboutGoal'));
    }

    public function update(Request $request, AboutGoal $aboutGoal)
    {
        $data = $request->validate([
            'number' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $aboutGoal->update($data);

        return redirect()->route('admin.about-goals.index')->with('success', 'Goal updated successfully.');
    }

    public function destroy(AboutGoal $aboutGoal)
    {
        $aboutGoal->delete();

        return redirect()->route('admin.about-goals.index')->with('success', 'Goal deleted successfully.');
    }
}