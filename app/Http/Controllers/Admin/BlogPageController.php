<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPage;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index(){ $blogPages = BlogPage::latest()->get(); return view('admin.blogPages.index', compact('blogPages')); }
    public function create(){ return view('admin.blogPages.create'); }
    public function store(Request $request){ $request->validate(['status'=>'required|boolean']); BlogPage::create($request->all()); return redirect()->route('admin.blog-pages.index')->with('success','Blog page created successfully.'); }
    public function show(BlogPage $blogPage){ return view('admin.blogPages.show', compact('blogPage')); }
    public function edit(BlogPage $blogPage){ return view('admin.blogPages.edit', compact('blogPage')); }
    public function update(Request $request, BlogPage $blogPage){ $request->validate(['status'=>'required|boolean']); $blogPage->update($request->all()); return redirect()->route('admin.blog-pages.index')->with('success','Blog page updated successfully.'); }
    public function destroy(BlogPage $blogPage){ $blogPage->delete(); return redirect()->route('admin.blog-pages.index')->with('success','Blog page deleted successfully.'); }
}
