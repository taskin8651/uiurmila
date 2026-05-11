<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWorkCategory;
use Illuminate\Http\Request;

class OurWorkCategoryController extends Controller
{
    public function index()
    {
        $ourWorkCategories = OurWorkCategory::orderBy('sort_order')->get();

        return view('admin.ourWorkCategories.index', compact('ourWorkCategories'));
    }

    public function create()
    {
        return view('admin.ourWorkCategories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta_one_icon' => 'nullable|string|max:255',
            'meta_one_text' => 'nullable|string|max:255',
            'meta_two_icon' => 'nullable|string|max:255',
            'meta_two_text' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        OurWorkCategory::create($data);

        return redirect()->route('admin.our-work-categories.index')->with('success', 'Program category created successfully.');
    }

    public function show(OurWorkCategory $ourWorkCategory)
    {
        return view('admin.ourWorkCategories.show', compact('ourWorkCategory'));
    }

    public function edit(OurWorkCategory $ourWorkCategory)
    {
        return view('admin.ourWorkCategories.edit', compact('ourWorkCategory'));
    }

    public function update(Request $request, OurWorkCategory $ourWorkCategory)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meta_one_icon' => 'nullable|string|max:255',
            'meta_one_text' => 'nullable|string|max:255',
            'meta_two_icon' => 'nullable|string|max:255',
            'meta_two_text' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $ourWorkCategory->update($data);

        return redirect()->route('admin.our-work-categories.index')->with('success', 'Program category updated successfully.');
    }

    public function destroy(OurWorkCategory $ourWorkCategory)
    {
        $ourWorkCategory->delete();

        return redirect()->route('admin.our-work-categories.index')->with('success', 'Program category deleted successfully.');
    }
}
