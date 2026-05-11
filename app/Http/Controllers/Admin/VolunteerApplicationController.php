<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerApplicationController extends Controller
{
    public function index()
    {
        $volunteerApplications = VolunteerApplication::latest()->get();

        return view('admin.volunteerApplications.index', compact('volunteerApplications'));
    }

    public function show(VolunteerApplication $volunteerApplication)
    {
        if ($volunteerApplication->status === 'new') {
            $volunteerApplication->update(['status' => 'read']);
        }

        return view('admin.volunteerApplications.show', compact('volunteerApplication'));
    }

    public function edit(VolunteerApplication $volunteerApplication)
    {
        return view('admin.volunteerApplications.edit', compact('volunteerApplication'));
    }

    public function update(Request $request, VolunteerApplication $volunteerApplication)
    {
        $data = $request->validate(['status' => 'required|string|max:255']);
        $volunteerApplication->update($data);

        return redirect()->route('admin.volunteer-applications.index')->with('success', 'Volunteer application updated successfully.');
    }

    public function destroy(VolunteerApplication $volunteerApplication)
    {
        $volunteerApplication->delete();

        return redirect()->route('admin.volunteer-applications.index')->with('success', 'Volunteer application deleted successfully.');
    }
}
