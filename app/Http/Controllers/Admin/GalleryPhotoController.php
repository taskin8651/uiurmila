<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryPhotoController extends Controller
{
    public function index()
    {
        $galleryPhotos = GalleryPhoto::orderBy('sort_order')->get();

        return view('admin.galleryPhotos.index', compact('galleryPhotos'));
    }

    public function create()
    {
        return view('admin.galleryPhotos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'card_class' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        GalleryPhoto::create($data);

        return redirect()->route('admin.gallery-photos.index')->with('success', 'Gallery photo created successfully.');
    }

    public function show(GalleryPhoto $galleryPhoto)
    {
        return view('admin.galleryPhotos.show', compact('galleryPhoto'));
    }

    public function edit(GalleryPhoto $galleryPhoto)
    {
        return view('admin.galleryPhotos.edit', compact('galleryPhoto'));
    }

    public function update(Request $request, GalleryPhoto $galleryPhoto)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'card_class' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($galleryPhoto->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $galleryPhoto->update($data);

        return redirect()->route('admin.gallery-photos.index')->with('success', 'Gallery photo updated successfully.');
    }

    public function destroy(GalleryPhoto $galleryPhoto)
    {
        $galleryPhoto->delete();

        return redirect()->route('admin.gallery-photos.index')->with('success', 'Gallery photo deleted successfully.');
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/gallery');
        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);
        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/gallery/' . $filename))) {
            File::delete(public_path('uploads/gallery/' . $filename));
        }
    }
}
