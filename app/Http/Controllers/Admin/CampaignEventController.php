<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampaignEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CampaignEventController extends Controller
{
    public function index()
    {
        $campaignEvents = CampaignEvent::orderBy('sort_order')->get();

        return view('admin.campaignEvents.index', compact('campaignEvents'));
    }

    public function create()
    {
        return view('admin.campaignEvents.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        foreach (['image', 'gallery_image_one', 'gallery_image_two', 'gallery_image_three'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $this->uploadImage($request->file($imageField));
            }
        }

        CampaignEvent::create($data);

        return redirect()->route('admin.campaign-events.index')->with('success', 'Campaign event created successfully.');
    }

    public function show(CampaignEvent $campaignEvent)
    {
        return view('admin.campaignEvents.show', compact('campaignEvent'));
    }

    public function edit(CampaignEvent $campaignEvent)
    {
        return view('admin.campaignEvents.edit', compact('campaignEvent'));
    }

    public function update(Request $request, CampaignEvent $campaignEvent)
    {
        $data = $this->validatedData($request);

        foreach (['image', 'gallery_image_one', 'gallery_image_two', 'gallery_image_three'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $this->deleteImage($campaignEvent->$imageField);
                $data[$imageField] = $this->uploadImage($request->file($imageField));
            }
        }

        $campaignEvent->update($data);

        return redirect()->route('admin.campaign-events.index')->with('success', 'Campaign event updated successfully.');
    }

    public function destroy(CampaignEvent $campaignEvent)
    {
        $campaignEvent->delete();

        return redirect()->route('admin.campaign-events.index')->with('success', 'Campaign event deleted successfully.');
    }

    private function validatedData(Request $request)
    {
        return $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery_image_one' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery_image_two' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gallery_image_three' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status_label' => 'nullable|string|max:255',
            'status_class' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'event_date' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_more_count' => 'nullable|string|max:255',
            'primary_button_text' => 'nullable|string|max:255',
            'primary_button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);
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
