<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();

        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'intro_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'founder_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except(['intro_image', 'founder_image']);

        if ($request->hasFile('intro_image')) {
            $data['intro_image'] = $this->uploadImage($request->file('intro_image'));
        }

        if ($request->hasFile('founder_image')) {
            $data['founder_image'] = $this->uploadImage($request->file('founder_image'));
        }

        About::create($data);

        return redirect()->route('admin.abouts.index')->with('success', 'About page created successfully.');
    }

    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'intro_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'founder_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except(['intro_image', 'founder_image']);

        if ($request->hasFile('intro_image')) {
            $this->deleteImage($about->intro_image);
            $data['intro_image'] = $this->uploadImage($request->file('intro_image'));
        }

        if ($request->hasFile('founder_image')) {
            $this->deleteImage($about->founder_image);
            $data['founder_image'] = $this->uploadImage($request->file('founder_image'));
        }

        $about->update($data);

        return redirect()->route('admin.abouts.index')->with('success', 'About page updated successfully.');
    }

    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('admin.abouts.index')->with('success', 'About page deleted successfully.');
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/about');

        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move($path, $filename);

        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/about/' . $filename))) {
            File::delete(public_path('uploads/about/' . $filename));
        }
    }
}