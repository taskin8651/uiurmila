<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use App\Models\Enquiry;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactPage = ContactPage::where('status', 1)->latest()->first();
        $websiteSetting = WebsiteSetting::where('status', 1)->latest()->first();

        return view('frontend.contact', compact('contactPage', 'websiteSetting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Enquiry::create($data);

        return redirect()->route('frontend.contact')->with('success', 'Your message has been sent successfully.');
    }
}
