<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryPage;
use App\Models\GalleryPhoto;
use App\Models\GalleryVideo;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryPage = GalleryPage::where('status', 1)->latest()->first();
        $galleryPhotos = GalleryPhoto::where('status', 1)->orderBy('sort_order')->get();
        $galleryAlbums = GalleryAlbum::where('status', 1)->orderBy('sort_order')->get();
        $galleryVideos = GalleryVideo::where('status', 1)->orderBy('sort_order')->get();

        return view('frontend.gallery', compact('galleryPage', 'galleryPhotos', 'galleryAlbums', 'galleryVideos'));
    }
}
