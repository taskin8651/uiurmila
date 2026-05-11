<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryAlbumController extends Controller
{
    public function index()
    {
        $galleryAlbums = GalleryAlbum::orderBy('sort_order')->get();

        return view('admin.galleryAlbums.index', compact('galleryAlbums'));
    }

    public function create()
    {
        return view('admin.galleryAlbums.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'photo_count' => 'nullable|string|max:255',
            'album_date' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadImage($request->file('cover_image'));
        }
        GalleryAlbum::create($data);

        return redirect()->route('admin.gallery-albums.index')->with('success', 'Gallery album created successfully.');
    }

    public function show(GalleryAlbum $galleryAlbum)
    {
        return view('admin.galleryAlbums.show', compact('galleryAlbum'));
    }

    public function edit(GalleryAlbum $galleryAlbum)
    {
        return view('admin.galleryAlbums.edit', compact('galleryAlbum'));
    }

    public function update(Request $request, GalleryAlbum $galleryAlbum)
    {
        $data = $request->validate([
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'photo_count' => 'nullable|string|max:255',
            'album_date' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('cover_image')) {
            $this->deleteImage($galleryAlbum->cover_image);
            $data['cover_image'] = $this->uploadImage($request->file('cover_image'));
        }
        $galleryAlbum->update($data);

        return redirect()->route('admin.gallery-albums.index')->with('success', 'Gallery album updated successfully.');
    }

    public function destroy(GalleryAlbum $galleryAlbum)
    {
        $galleryAlbum->delete();

        return redirect()->route('admin.gallery-albums.index')->with('success', 'Gallery album deleted successfully.');
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
