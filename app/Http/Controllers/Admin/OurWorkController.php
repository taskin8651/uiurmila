<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use Illuminate\Http\Request;

class OurWorkController extends Controller
{
    public function index()
    {
        $ourWorks = OurWork::latest()->get();

        return view('admin.ourWorks.index', compact('ourWorks'));
    }

    public function create()
    {
        return view('admin.ourWorks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        OurWork::create($data);

        return redirect()->route('admin.our-works.index')->with('success', 'Our Work content created successfully.');
    }

    public function show(OurWork $ourWork)
    {
        return view('admin.ourWorks.show', compact('ourWork'));
    }

    public function edit(OurWork $ourWork)
    {
        return view('admin.ourWorks.edit', compact('ourWork'));
    }

    public function update(Request $request, OurWork $ourWork)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $ourWork->update($request->all());

        return redirect()->route('admin.our-works.index')->with('success', 'Our Work content updated successfully.');
    }

    public function destroy(OurWork $ourWork)
    {
        $ourWork->delete();

        return redirect()->route('admin.our-works.index')->with('success', 'Our Work content deleted successfully.');
    }
}
