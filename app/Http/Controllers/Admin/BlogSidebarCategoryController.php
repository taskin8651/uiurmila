<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSidebarCategory;
use Illuminate\Http\Request;

class BlogSidebarCategoryController extends Controller
{
    public function index(){ $blogSidebarCategories = BlogSidebarCategory::orderBy('sort_order')->get(); return view('admin.blogSidebarCategories.index', compact('blogSidebarCategories')); }
    public function create(){ return view('admin.blogSidebarCategories.create'); }
    public function store(Request $request){ $data=$request->validate(['title'=>'required|string|max:255','count'=>'nullable|string|max:255','link'=>'nullable|string|max:255','sort_order'=>'nullable|integer','status'=>'required|boolean']); BlogSidebarCategory::create($data); return redirect()->route('admin.blog-sidebar-categories.index')->with('success','Sidebar category created successfully.'); }
    public function show(BlogSidebarCategory $blogSidebarCategory){ return view('admin.blogSidebarCategories.show', compact('blogSidebarCategory')); }
    public function edit(BlogSidebarCategory $blogSidebarCategory){ return view('admin.blogSidebarCategories.edit', compact('blogSidebarCategory')); }
    public function update(Request $request, BlogSidebarCategory $blogSidebarCategory){ $data=$request->validate(['title'=>'required|string|max:255','count'=>'nullable|string|max:255','link'=>'nullable|string|max:255','sort_order'=>'nullable|integer','status'=>'required|boolean']); $blogSidebarCategory->update($data); return redirect()->route('admin.blog-sidebar-categories.index')->with('success','Sidebar category updated successfully.'); }
    public function destroy(BlogSidebarCategory $blogSidebarCategory){ $blogSidebarCategory->delete(); return redirect()->route('admin.blog-sidebar-categories.index')->with('success','Sidebar category deleted successfully.'); }
}
