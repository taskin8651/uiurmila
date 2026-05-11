<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogPage;
use App\Models\BlogSidebarCategory;
use App\Models\BlogTopic;

class BlogController extends Controller
{
    public function index()
    {
        $blogPage = BlogPage::where('status', 1)->latest()->first();
        $featuredBlog = Blog::where('status', 1)->where('is_featured', 1)->orderBy('sort_order')->first();
        $blogs = Blog::where('status', 1)->orderBy('sort_order')->latest()->get();
        $blogTopics = BlogTopic::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.blog', compact('blogPage', 'featuredBlog', 'blogs', 'blogTopics'));
    }

    public function show($slug)
    {
        $blogPage = BlogPage::where('status', 1)->latest()->first();
        $blog = Blog::where('status', 1)->where('slug', $slug)->firstOrFail();
        $relatedBlogs = Blog::where('status', 1)->where('id', '!=', $blog->id)->orderBy('sort_order')->take(3)->get();
        $sidebarCategories = BlogSidebarCategory::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.blog-details', compact('blogPage', 'blog', 'relatedBlogs', 'sidebarCategories'));
    }
}
