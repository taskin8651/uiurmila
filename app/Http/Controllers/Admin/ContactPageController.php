<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactPages = ContactPage::latest()->get();

        return view('admin.contactPages.index', compact('contactPages'));
    }

    public function create()
    {
        return view('admin.contactPages.create');
    }

    public function store(Request $request)
    {
        $request->validate(['status' => 'required|boolean']);
        ContactPage::create($request->all());

        return redirect()->route('admin.contact-pages.index')->with('success', 'Contact page created successfully.');
    }

    public function show(ContactPage $contactPage)
    {
        return view('admin.contactPages.show', compact('contactPage'));
    }

    public function edit(ContactPage $contactPage)
    {
        return view('admin.contactPages.edit', compact('contactPage'));
    }

    public function update(Request $request, ContactPage $contactPage)
    {
        $request->validate(['status' => 'required|boolean']);
        $contactPage->update($request->all());

        return redirect()->route('admin.contact-pages.index')->with('success', 'Contact page updated successfully.');
    }

    public function destroy(ContactPage $contactPage)
    {
        $contactPage->delete();

        return redirect()->route('admin.contact-pages.index')->with('success', 'Contact page deleted successfully.');
    }
}
