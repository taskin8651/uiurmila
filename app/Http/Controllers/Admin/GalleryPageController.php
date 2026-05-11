<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPage;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    public function index()
    {
        $galleryPages = GalleryPage::latest()->get();

        return view('admin.galleryPages.index', compact('galleryPages'));
    }

    public function create()
    {
        return view('admin.galleryPages.create');
    }

    public function store(Request $request)
    {
        $request->validate(['hero_title' => 'nullable|string|max:255', 'status' => 'required|boolean']);
        GalleryPage::create($request->all());

        return redirect()->route('admin.gallery-pages.index')->with('success', 'Gallery page content created successfully.');
    }

    public function show(GalleryPage $galleryPage)
    {
        return view('admin.galleryPages.show', compact('galleryPage'));
    }

    public function edit(GalleryPage $galleryPage)
    {
        return view('admin.galleryPages.edit', compact('galleryPage'));
    }

    public function update(Request $request, GalleryPage $galleryPage)
    {
        $request->validate(['hero_title' => 'nullable|string|max:255', 'status' => 'required|boolean']);
        $galleryPage->update($request->all());

        return redirect()->route('admin.gallery-pages.index')->with('success', 'Gallery page content updated successfully.');
    }

    public function destroy(GalleryPage $galleryPage)
    {
        $galleryPage->delete();

        return redirect()->route('admin.gallery-pages.index')->with('success', 'Gallery page content deleted successfully.');
    }
}
