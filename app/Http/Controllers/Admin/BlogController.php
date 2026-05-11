<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){ $blogs = Blog::orderBy('sort_order')->latest()->get(); return view('admin.blogs.index', compact('blogs')); }
    public function create(){ return view('admin.blogs.create'); }
    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($request->hasFile('image')) $data['image'] = $this->uploadImage($request->file('image'));
        Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success','Blog created successfully.');
    }
    public function show(Blog $blog){ return view('admin.blogs.show', compact('blog')); }
    public function edit(Blog $blog){ return view('admin.blogs.edit', compact('blog')); }
    public function update(Request $request, Blog $blog)
    {
        $data = $this->validatedData($request, $blog->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        if ($request->hasFile('image')) { $this->deleteImage($blog->image); $data['image'] = $this->uploadImage($request->file('image')); }
        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success','Blog updated successfully.');
    }
    public function destroy(Blog $blog){ $blog->delete(); return redirect()->route('admin.blogs.index')->with('success','Blog deleted successfully.'); }
    private function validatedData(Request $request, $id = null)
    {
        return $request->validate([
            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category'=>'nullable|string|max:255','published_date'=>'nullable|string|max:255','author'=>'nullable|string|max:255',
            'title'=>'required|string|max:255','slug'=>'nullable|string|max:255|unique:blogs,slug,' . $id,
            'short_description'=>'nullable|string','lead_paragraph'=>'nullable|string','content'=>'nullable|string',
            'highlight_icon'=>'nullable|string|max:255','highlight_title'=>'nullable|string|max:255','highlight_text'=>'nullable|string',
            'quote'=>'nullable|string','tags'=>'nullable|string','is_featured'=>'required|boolean','sort_order'=>'nullable|integer','status'=>'required|boolean',
        ]);
    }
    private function uploadImage($file){ $path=public_path('uploads/blog'); if(!File::exists($path)) File::makeDirectory($path,0777,true); $filename=time().'_'.uniqid().'.'.$file->getClientOriginalExtension(); $file->move($path,$filename); return $filename; }
    private function deleteImage($filename){ if($filename && File::exists(public_path('uploads/blog/'.$filename))) File::delete(public_path('uploads/blog/'.$filename)); }
}
