<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DonatePage;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        $donatePage = DonatePage::where('status', 1)->latest()->first();

        return view('frontend.donate', compact('donatePage'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'amount' => 'nullable|numeric|min:1',
            'quick_amount' => 'nullable|string|max:255',
            'payment_mode' => 'nullable|string|max:255',
            'donation_purpose' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Donation::create($data);

        $donatePage = DonatePage::where('status', 1)->latest()->first();
        $message = $donatePage?->form_success_message ?? 'Your donation details have been submitted successfully.';

        return redirect()->route('frontend.donate')->with('success', $message);
    }
}
