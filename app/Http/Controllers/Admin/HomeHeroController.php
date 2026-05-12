<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeHeroController extends Controller
{
    public function index()
    {
        $homeHero = HomeHero::latest()->first();

        return view('admin.homeHero.index', compact('homeHero'));
    }

    public function update(Request $request)
    {
        $homeHero = HomeHero::latest()->first();

        $data = $request->validate([
            'badge_icon' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'primary_button_text' => 'nullable|string|max:255',
            'primary_button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'small_card_icon' => 'nullable|string|max:255',
            'small_card_title' => 'nullable|string|max:255',
            'small_card_text' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($homeHero) {
                $this->deleteImage($homeHero->image);
            }

            $data['image'] = $this->uploadImage($request->file('image'));
        } else {
            unset($data['image']);
        }

        if ($homeHero) {
            $homeHero->update($data);
        } else {
            HomeHero::create($data);
        }

        return redirect()->route('admin.home-hero.index')->with('message', 'Home hero updated successfully.');
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/home-hero');

        if (! File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/home-hero/' . $filename))) {
            File::delete(public_path('uploads/home-hero/' . $filename));
        }
    }
}
