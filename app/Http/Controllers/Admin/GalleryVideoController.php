<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryVideoController extends Controller
{
    public function index()
    {
        $galleryVideos = GalleryVideo::orderBy('sort_order')->get();

        return view('admin.galleryVideos.index', compact('galleryVideos'));
    }

    public function create()
    {
        return view('admin.galleryVideos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'video_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->uploadImage($request->file('thumbnail'));
        }
        GalleryVideo::create($data);

        return redirect()->route('admin.gallery-videos.index')->with('success', 'Gallery video created successfully.');
    }

    public function show(GalleryVideo $galleryVideo)
    {
        return view('admin.galleryVideos.show', compact('galleryVideo'));
    }

    public function edit(GalleryVideo $galleryVideo)
    {
        return view('admin.galleryVideos.edit', compact('galleryVideo'));
    }

    public function update(Request $request, GalleryVideo $galleryVideo)
    {
        $data = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'video_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('thumbnail')) {
            $this->deleteImage($galleryVideo->thumbnail);
            $data['thumbnail'] = $this->uploadImage($request->file('thumbnail'));
        }
        $galleryVideo->update($data);

        return redirect()->route('admin.gallery-videos.index')->with('success', 'Gallery video updated successfully.');
    }

    public function destroy(GalleryVideo $galleryVideo)
    {
        $galleryVideo->delete();

        return redirect()->route('admin.gallery-videos.index')->with('success', 'Gallery video deleted successfully.');
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
