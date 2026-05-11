@extends('frontend.master')

@section('content')
@php
    $fallbackImage = asset('assets/img/gallery/gallery (11).jpeg');
    $tags = collect(explode(',', (string) $blog->tags))->map(fn($tag) => trim($tag))->filter();
@endphp

<section class="blog-detail-hero">
    <span class="blog-detail-shape detail-shape-one"></span>
    <span class="blog-detail-shape detail-shape-two"></span>

    <div class="container">
        <div class="blog-detail-hero-box text-center">
            <span class="section-badge blog-detail-badge">
                <i class="bi bi-newspaper"></i>
                {{ $blog->category }}
            </span>

            <h1>{{ $blog->title }}</h1>
            <p>{{ $blog->short_description }}</p>

            <div class="blog-detail-meta">
                <span><i class="bi bi-calendar3"></i> {{ $blog->published_date }}</span>
                <span><i class="bi bi-person-circle"></i> {{ $blog->author }}</span>
                <span><i class="bi bi-folder2-open"></i> {{ $blog->category }}</span>
            </div>

            <nav aria-label="breadcrumb" class="blog-detail-breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('frontend.blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->category }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section-padding blog-detail-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <article class="blog-detail-article">
                    <div class="blog-detail-main-img">
                        <img src="{{ $blog->image ? asset('uploads/blog/' . $blog->image) : $fallbackImage }}" alt="{{ $blog->title }}">
                    </div>

                    <div class="blog-detail-content">
                        @if($blog->lead_paragraph)
                            <p class="blog-lead">{{ $blog->lead_paragraph }}</p>
                        @endif

                        @if($blog->content)
                            <p>{!! nl2br(e($blog->content)) !!}</p>
                        @endif

                        @if($blog->highlight_title || $blog->highlight_text)
                            <div class="blog-highlight-box">
                                <i class="bi {{ $blog->highlight_icon ?: 'bi-heart-pulse-fill' }}"></i>
                                <div>
                                    <h4>{{ $blog->highlight_title }}</h4>
                                    <p>{{ $blog->highlight_text }}</p>
                                </div>
                            </div>
                        @endif

                        @if($blog->quote)
                            <blockquote>{{ $blog->quote }}</blockquote>
                        @endif

                        @if($tags->count())
                            <div class="blog-detail-tags">
                                @foreach($tags as $tag)
                                    <span>{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                <aside class="blog-detail-sidebar">
                    <div class="sidebar-card author-card">
                        <div class="author-icon"><i class="bi bi-person-circle"></i></div>
                        <h4>{{ $blogPage->detail_author_name ?? 'URMILA Team' }}</h4>
                        <p>{{ $blogPage->detail_author_description ?? 'Publishing updates, awareness content, activity reports, and community stories from URMILA Development Foundation.' }}</p>
                    </div>

                    <div class="sidebar-card">
                        <h4>{{ $blogPage->detail_share_title ?? 'Share This Article' }}</h4>
                        <div class="blog-share-links">
                            <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <h4>{{ $blogPage->detail_categories_title ?? 'Categories' }}</h4>
                        <ul class="blog-category-list">
                            @forelse($sidebarCategories as $category)
                                <li>
                                    <a href="{{ $category->link ?: route('frontend.blog') }}">
                                        <span>{{ $category->title }}</span>
                                        <strong>{{ str_pad($category->count, 2, '0', STR_PAD_LEFT) }}</strong>
                                    </a>
                                </li>
                            @empty
                                <li><a href="{{ route('frontend.blog') }}"><span>{{ $blog->category }}</span><strong>01</strong></a></li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="sidebar-donate-card">
                        <span>{{ $blogPage->detail_donate_badge ?? 'Support Our Work' }}</span>
                        <h4>{{ $blogPage->detail_donate_title ?? 'Help Us Reach More Communities' }}</h4>
                        <p>{{ $blogPage->detail_donate_description ?? 'Your donation can support health camps, awareness programs, food support, and education initiatives.' }}</p>
                        <a href="{{ $blogPage->detail_donate_button_link ?? 'donate.html' }}">
                            {{ $blogPage->detail_donate_button_text ?? 'Donate Now' }}
                            <i class="bi bi-heart-fill"></i>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@if($relatedBlogs->count())
    <section class="section-padding related-blog-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge related-blog-badge">
                    <i class="bi bi-journal-text"></i>
                    {{ $blogPage->related_badge ?? 'Related Articles' }}
                </span>
                <h2 class="section-title">{{ $blogPage->related_title ?? 'More Stories You May Like' }}</h2>
                <p class="section-text mx-auto">{{ $blogPage->related_description ?? 'Read more updates, awareness content, and community stories from the foundation.' }}</p>
            </div>

            <div class="row g-4">
                @foreach($relatedBlogs as $relatedBlog)
                    <div class="col-md-6 col-lg-4">
                        <article class="blog-card">
                            <div class="blog-card-img">
                                <img src="{{ $relatedBlog->image ? asset('uploads/blog/' . $relatedBlog->image) : asset('assets/img/gallery/gallery (13).jpeg') }}" alt="{{ $relatedBlog->title }}">
                                <span class="blog-category">{{ $relatedBlog->category }}</span>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span><i class="bi bi-calendar3"></i> {{ $relatedBlog->published_date }}</span>
                                    <span><i class="bi bi-person-circle"></i> {{ $relatedBlog->author }}</span>
                                </div>
                                <h4><a href="{{ route('frontend.blog.show', $relatedBlog->slug) }}">{{ $relatedBlog->title }}</a></h4>
                                <p>{{ $relatedBlog->short_description }}</p>
                                <a href="{{ route('frontend.blog.show', $relatedBlog->slug) }}" class="blog-read-link">
                                    Read More
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<section class="blog-detail-cta-section">
    <div class="container">
        <div class="blog-detail-cta-box">
            <div>
                <span>{{ $blogPage->detail_cta_badge ?? 'Support Our Mission' }}</span>
                <h2>{{ $blogPage->detail_cta_title ?? 'Help Us Create More Community Impact' }}</h2>
                <p>{{ $blogPage->detail_cta_description ?? 'Join hands with URMILA Development Foundation as a donor, volunteer, or campaign supporter.' }}</p>
            </div>
            <div class="blog-detail-cta-actions">
                <a href="{{ $blogPage->detail_cta_primary_button_link ?? 'donate.html' }}" class="btn btn-light-custom">
                    {{ $blogPage->detail_cta_primary_button_text ?? 'Donate Now' }}
                </a>
                <a href="{{ $blogPage->detail_cta_secondary_button_link ?? 'volunteer.html' }}" class="btn btn-outline-light-custom">
                    {{ $blogPage->detail_cta_secondary_button_text ?? 'Become Volunteer' }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
