<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutValue;
use App\Models\AboutObjective;
use App\Models\AboutGoal;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::where('status', 1)
            ->latest()
            ->first();

        $values = AboutValue::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $objectives = AboutObjective::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $goals = AboutGoal::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.about', compact(
            'about',
            'values',
            'objectives',
            'goals'
        ));
    }
}