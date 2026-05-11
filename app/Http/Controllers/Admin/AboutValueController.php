<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutValue;
use Illuminate\Http\Request;

class AboutValueController extends Controller
{
    public function index()
    {
        $aboutValues = AboutValue::orderBy('sort_order')->get();

        return view('admin.aboutValues.index', compact('aboutValues'));
    }

    public function create()
    {
        return view('admin.aboutValues.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        AboutValue::create($data);

        return redirect()->route('admin.about-values.index')->with('success', 'Core value created successfully.');
    }

    public function show(AboutValue $aboutValue)
    {
        return view('admin.aboutValues.show', compact('aboutValue'));
    }

    public function edit(AboutValue $aboutValue)
    {
        return view('admin.aboutValues.edit', compact('aboutValue'));
    }

    public function update(Request $request, AboutValue $aboutValue)
    {
        $data = $request->validate([
            'number' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $aboutValue->update($data);

        return redirect()->route('admin.about-values.index')->with('success', 'Core value updated successfully.');
    }

    public function destroy(AboutValue $aboutValue)
    {
        $aboutValue->delete();

        return redirect()->route('admin.about-values.index')->with('success', 'Core value deleted successfully.');
    }
}