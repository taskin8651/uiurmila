<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWorkInitiative;
use Illuminate\Http\Request;

class OurWorkInitiativeController extends Controller
{
    public function index()
    {
        $ourWorkInitiatives = OurWorkInitiative::orderBy('sort_order')->get();

        return view('admin.ourWorkInitiatives.index', compact('ourWorkInitiatives'));
    }

    public function create()
    {
        return view('admin.ourWorkInitiatives.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        OurWorkInitiative::create($data);

        return redirect()->route('admin.our-work-initiatives.index')->with('success', 'Initiative created successfully.');
    }

    public function show(OurWorkInitiative $ourWorkInitiative)
    {
        return view('admin.ourWorkInitiatives.show', compact('ourWorkInitiative'));
    }

    public function edit(OurWorkInitiative $ourWorkInitiative)
    {
        return view('admin.ourWorkInitiatives.edit', compact('ourWorkInitiative'));
    }

    public function update(Request $request, OurWorkInitiative $ourWorkInitiative)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $ourWorkInitiative->update($data);

        return redirect()->route('admin.our-work-initiatives.index')->with('success', 'Initiative updated successfully.');
    }

    public function destroy(OurWorkInitiative $ourWorkInitiative)
    {
        $ourWorkInitiative->delete();

        return redirect()->route('admin.our-work-initiatives.index')->with('success', 'Initiative deleted successfully.');
    }
}
