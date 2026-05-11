<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use App\Models\OurWorkCategory;
use App\Models\OurWorkDetail;
use App\Models\OurWorkInitiative;

class OurWorkController extends Controller
{
    public function index()
    {
        $ourWork = OurWork::where('status', 1)->latest()->first();

        $categories = OurWorkCategory::where('status', 1)->orderBy('sort_order')->get();
        $details = OurWorkDetail::where('status', 1)->orderBy('sort_order')->get();
        $initiatives = OurWorkInitiative::where('status', 1)->orderBy('sort_order')->get();

        return view('frontend.our-work', compact(
            'ourWork',
            'categories',
            'details',
            'initiatives'
        ));
    }
}
