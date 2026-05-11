<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampaignPage;
use Illuminate\Http\Request;

class CampaignPageController extends Controller
{
    public function index()
    {
        $campaignPages = CampaignPage::latest()->get();

        return view('admin.campaignPages.index', compact('campaignPages'));
    }

    public function create()
    {
        return view('admin.campaignPages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        CampaignPage::create($request->all());

        return redirect()->route('admin.campaign-pages.index')->with('success', 'Campaign page content created successfully.');
    }

    public function show(CampaignPage $campaignPage)
    {
        return view('admin.campaignPages.show', compact('campaignPage'));
    }

    public function edit(CampaignPage $campaignPage)
    {
        return view('admin.campaignPages.edit', compact('campaignPage'));
    }

    public function update(Request $request, CampaignPage $campaignPage)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $campaignPage->update($request->all());

        return redirect()->route('admin.campaign-pages.index')->with('success', 'Campaign page content updated successfully.');
    }

    public function destroy(CampaignPage $campaignPage)
    {
        $campaignPage->delete();

        return redirect()->route('admin.campaign-pages.index')->with('success', 'Campaign page content deleted successfully.');
    }
}
