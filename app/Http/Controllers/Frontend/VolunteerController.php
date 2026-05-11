<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('frontend.volunteer');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'city' => 'nullable|string|max:255',
            'area_of_interest' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        VolunteerApplication::create($data);

        return redirect()->route('frontend.volunteer')->with('success', 'Your volunteer application has been submitted successfully.');
    }
}
