<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $websiteSettings = WebsiteSetting::latest()->get();

        return view('admin.websiteSettings.index', compact('websiteSettings'));
    }

    public function create()
    {
        return view('admin.websiteSettings.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $this->handleUploads($request, $data);
        WebsiteSetting::create($data);

        return redirect()->route('admin.website-settings.index')->with('success', 'Website setting created successfully.');
    }

    public function show(WebsiteSetting $websiteSetting)
    {
        return view('admin.websiteSettings.show', compact('websiteSetting'));
    }

    public function edit(WebsiteSetting $websiteSetting)
    {
        return view('admin.websiteSettings.edit', compact('websiteSetting'));
    }

    public function update(Request $request, WebsiteSetting $websiteSetting)
    {
        $data = $this->validatedData($request);
        $this->handleUploads($request, $data, $websiteSetting);
        $websiteSetting->update($data);

        return redirect()->route('admin.website-settings.index')->with('success', 'Website setting updated successfully.');
    }

    public function destroy(WebsiteSetting $websiteSetting)
    {
        $websiteSetting->delete();

        return redirect()->route('admin.website-settings.index')->with('success', 'Website setting deleted successfully.');
    }

    private function validatedData(Request $request)
    {
        return $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:1024',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'site_name' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_author' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'alternate_phone' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:255',
            'map_link' => 'nullable|string',
            'map_embed_url' => 'nullable|string',
            'office_time' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'instagram_link' => 'nullable|string|max:255',
            'youtube_link' => 'nullable|string|max:255',
            'twitter_link' => 'nullable|string|max:255',
            'linkedin_link' => 'nullable|string|max:255',
            'footer_about' => 'nullable|string',
            'footer_tagline' => 'nullable|string|max:255',
            'copyright_text' => 'nullable|string|max:255',
            'donate_button_text' => 'nullable|string|max:255',
            'donate_button_link' => 'nullable|string|max:255',
            'volunteer_button_text' => 'nullable|string|max:255',
            'volunteer_button_link' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);
    }

    private function handleUploads(Request $request, array &$data, WebsiteSetting $websiteSetting = null)
    {
        foreach (['logo', 'footer_logo', 'favicon', 'og_image'] as $field) {
            if ($request->hasFile($field)) {
                if ($websiteSetting && $websiteSetting->$field) {
                    $this->deleteImage($websiteSetting->$field);
                }
                $data[$field] = $this->uploadImage($request->file($field));
            }
        }
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/settings');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/settings/' . $filename))) {
            File::delete(public_path('uploads/settings/' . $filename));
        }
    }
}
