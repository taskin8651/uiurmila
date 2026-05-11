<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWorkDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurWorkDetailController extends Controller
{
    public function index()
    {
        $ourWorkDetails = OurWorkDetail::orderBy('sort_order')->get();

        return view('admin.ourWorkDetails.index', compact('ourWorkDetails'));
    }

    public function create()
    {
        return view('admin.ourWorkDetails.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_id' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'beneficiaries_label' => 'nullable|string|max:255',
            'beneficiaries_text' => 'nullable|string|max:255',
            'impact_label' => 'nullable|string|max:255',
            'impact_text' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'is_reverse' => 'required|boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        OurWorkDetail::create($data);

        return redirect()->route('admin.our-work-details.index')->with('success', 'Program detail created successfully.');
    }

    public function show(OurWorkDetail $ourWorkDetail)
    {
        return view('admin.ourWorkDetails.show', compact('ourWorkDetail'));
    }

    public function edit(OurWorkDetail $ourWorkDetail)
    {
        return view('admin.ourWorkDetails.edit', compact('ourWorkDetail'));
    }

    public function update(Request $request, OurWorkDetail $ourWorkDetail)
    {
        $data = $request->validate([
            'section_id' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'beneficiaries_label' => 'nullable|string|max:255',
            'beneficiaries_text' => 'nullable|string|max:255',
            'impact_label' => 'nullable|string|max:255',
            'impact_text' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'is_reverse' => 'required|boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($ourWorkDetail->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $ourWorkDetail->update($data);

        return redirect()->route('admin.our-work-details.index')->with('success', 'Program detail updated successfully.');
    }

    public function destroy(OurWorkDetail $ourWorkDetail)
    {
        $ourWorkDetail->delete();

        return redirect()->route('admin.our-work-details.index')->with('success', 'Program detail deleted successfully.');
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/our-work');

        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/our-work/' . $filename))) {
            File::delete(public_path('uploads/our-work/' . $filename));
        }
    }
}
