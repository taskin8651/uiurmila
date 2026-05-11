<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutObjective;
use Illuminate\Http\Request;

class AboutObjectiveController extends Controller
{
    public function index()
    {
        $aboutObjectives = AboutObjective::orderBy('sort_order')->get();

        return view('admin.aboutObjectives.index', compact('aboutObjectives'));
    }

    public function create()
    {
        return view('admin.aboutObjectives.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        AboutObjective::create($data);

        return redirect()->route('admin.about-objectives.index')->with('success', 'Objective created successfully.');
    }

    public function show(AboutObjective $aboutObjective)
    {
        return view('admin.aboutObjectives.show', compact('aboutObjective'));
    }

    public function edit(AboutObjective $aboutObjective)
    {
        return view('admin.aboutObjectives.edit', compact('aboutObjective'));
    }

    public function update(Request $request, AboutObjective $aboutObjective)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $aboutObjective->update($data);

        return redirect()->route('admin.about-objectives.index')->with('success', 'Objective updated successfully.');
    }

    public function destroy(AboutObjective $aboutObjective)
    {
        $aboutObjective->delete();

        return redirect()->route('admin.about-objectives.index')->with('success', 'Objective deleted successfully.');
    }
}