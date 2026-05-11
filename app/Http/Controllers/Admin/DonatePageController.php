<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonatePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DonatePageController extends Controller
{
    public function index()
    {
        $donatePages = DonatePage::latest()->get();

        return view('admin.donatePages.index', compact('donatePages'));
    }

    public function create()
    {
        return view('admin.donatePages.create');
    }

    public function store(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);
        $data = $request->all();

        if ($request->hasFile('qr_image')) {
            $data['qr_image'] = $this->uploadImage($request->file('qr_image'));
        }

        DonatePage::create($data);

        return redirect()->route('admin.donate-pages.index')->with('success', 'Donate page created successfully.');
    }

    public function show(DonatePage $donatePage)
    {
        return view('admin.donatePages.show', compact('donatePage'));
    }

    public function edit(DonatePage $donatePage)
    {
        return view('admin.donatePages.edit', compact('donatePage'));
    }

    public function update(Request $request, DonatePage $donatePage)
    {
        $request->validate(['status' => 'required|boolean']);
        $data = $request->all();

        if ($request->hasFile('qr_image')) {
            $this->deleteImage($donatePage->qr_image);
            $data['qr_image'] = $this->uploadImage($request->file('qr_image'));
        } else {
            unset($data['qr_image']);
        }

        $donatePage->update($data);

        return redirect()->route('admin.donate-pages.index')->with('success', 'Donate page updated successfully.');
    }

    public function destroy(DonatePage $donatePage)
    {
        $this->deleteImage($donatePage->qr_image);
        $donatePage->delete();

        return redirect()->route('admin.donate-pages.index')->with('success', 'Donate page deleted successfully.');
    }

    private function uploadImage($file)
    {
        $path = public_path('uploads/donate');

        if (! File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return $filename;
    }

    private function deleteImage($filename)
    {
        if ($filename && File::exists(public_path('uploads/donate/' . $filename))) {
            File::delete(public_path('uploads/donate/' . $filename));
        }
    }
}
