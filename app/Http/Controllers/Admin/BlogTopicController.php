<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTopic;
use Illuminate\Http\Request;

class BlogTopicController extends Controller
{
    public function index(){ $blogTopics = BlogTopic::orderBy('sort_order')->get(); return view('admin.blogTopics.index', compact('blogTopics')); }
    public function create(){ return view('admin.blogTopics.create'); }
    public function store(Request $request){ $data=$request->validate(['icon'=>'nullable|string|max:255','title'=>'required|string|max:255','description'=>'nullable|string','sort_order'=>'nullable|integer','status'=>'required|boolean']); BlogTopic::create($data); return redirect()->route('admin.blog-topics.index')->with('success','Blog topic created successfully.'); }
    public function show(BlogTopic $blogTopic){ return view('admin.blogTopics.show', compact('blogTopic')); }
    public function edit(BlogTopic $blogTopic){ return view('admin.blogTopics.edit', compact('blogTopic')); }
    public function update(Request $request, BlogTopic $blogTopic){ $data=$request->validate(['icon'=>'nullable|string|max:255','title'=>'required|string|max:255','description'=>'nullable|string','sort_order'=>'nullable|integer','status'=>'required|boolean']); $blogTopic->update($data); return redirect()->route('admin.blog-topics.index')->with('success','Blog topic updated successfully.'); }
    public function destroy(BlogTopic $blogTopic){ $blogTopic->delete(); return redirect()->route('admin.blog-topics.index')->with('success','Blog topic deleted successfully.'); }
}
