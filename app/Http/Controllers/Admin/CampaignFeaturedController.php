<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampaignFeatured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CampaignFeaturedController extends Controller
{
    public function index()
    {
        $campaignFeatureds = CampaignFeatured::orderBy('sort_order')->get();

        return view('admin.campaignFeatureds.index', compact('campaignFeatureds'));
    }

    public function create()
    {
        return view('admin.campaignFeatureds.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        CampaignFeatured::create($data);

        return redirect()->route('admin.campaign-featureds.index')->with('success', 'Featured campaign created successfully.');
    }

    public function show(CampaignFeatured $campaignFeatured)
    {
        return view('admin.campaignFeatureds.show', compact('campaignFeatured'));
    }

    public function edit(CampaignFeatured $campaignFeatured)
    {
        return view('admin.campaignFeatureds.edit', compact('campaignFeatured'));
    }

    public function update(Request $request, CampaignFeatured $campaignFeatured)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $this->deleteImage($campaignFeatured->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $campaignFeatured->update($data);

        return redirect()->route('admin.campaign-featureds.index')->with('success', 'Featured campaign updated successfully.');
    }

    public function destroy(CampaignFeatured $campaignFeatured)
    {
        $campaignFeatured->delete();

        return redirect()->route('admin.campaign-featureds.index')->with('success', 'Featured campaign deleted successfully.');
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/campaigns');
        if (! File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/campaigns/' . $filename))) {
            File::delete(public_path('uploads/campaigns/' . $filename));
        }
    }
}
