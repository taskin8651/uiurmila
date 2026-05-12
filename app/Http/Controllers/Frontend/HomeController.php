<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\CampaignEvent;
use App\Models\ContactPage;
use App\Models\GalleryPhoto;
use App\Models\OurWorkCategory;
use App\Models\WebsiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::where('status', 1)->latest()->first();
        $programs = OurWorkCategory::where('status', 1)->orderBy('sort_order')->take(3)->get();
        $events = CampaignEvent::where('status', 1)->orderBy('sort_order')->latest()->take(3)->get();
        $galleryPhotos = GalleryPhoto::where('status', 1)->orderBy('sort_order')->latest()->take(3)->get();
        $contactPage = ContactPage::where('status', 1)->latest()->first();
        $websiteSetting = WebsiteSetting::where('status', 1)->latest()->first();

        return view('frontend.index', compact(
            'about',
            'programs',
            'events',
            'galleryPhotos',
            'contactPage',
            'websiteSetting'
        ));
    }
}
