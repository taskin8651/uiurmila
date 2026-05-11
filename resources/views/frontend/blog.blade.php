@extends('frontend.master')

@section('content')
@php
    $blogPage = $blogPage ?? null;
    $heroTopics = [
        [$blogPage->hero_topic_one_icon ?? 'bi-heart-pulse-fill', $blogPage->hero_topic_one_title ?? 'Health'],
        [$blogPage->hero_topic_two_icon ?? 'bi-book-fill', $blogPage->hero_topic_two_title ?? 'Education'],
        [$blogPage->hero_topic_three_icon ?? 'bi-person-hearts', $blogPage->hero_topic_three_title ?? 'Women'],
        [$blogPage->hero_topic_four_icon ?? 'bi-tree-fill', $blogPage->hero_topic_four_title ?? 'Environment'],
    ];
    $filters = collect([
        $blogPage->filter_one ?? 'All',
        $blogPage->filter_two ?? 'NGO Activities',
        $blogPage->filter_three ?? 'Health',
        $blogPage->filter_four ?? 'Education',
        $blogPage->filter_five ?? 'Women Empowerment',
        $blogPage->filter_six ?? 'Environment',
    ])->filter();
    $fallbackImage = asset('assets/img/gallery/gallery (10).jpeg');
@endphp

<section class="blog-page-hero">
    <span class="blog-hero-shape blog-shape-one"></span>
    <span class="blog-hero-shape blog-shape-two"></span>

    <div class="container">
        <div class="blog-hero-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="blog-hero-content">
                        <span class="section-badge blog-hero-badge">
                            <i class="bi bi-newspaper"></i>
                            {{ $blogPage->hero_badge ?? 'Blog & News' }}
                        </span>

                        <h1>{{ $blogPage->hero_title ?? 'Stories, Updates and Awareness for Social Change' }}</h1>
                        <p>{{ $blogPage->hero_description ?? 'Read updates from our activities, awareness articles, community stories, social welfare reports, and news from URMILA Development Foundation.' }}</p>

                        <div class="blog-hero-actions">
                            <a href="{{ $blogPage->hero_primary_button_link ?? '#blog-list' }}" class="btn btn-primary-custom">
                                {{ $blogPage->hero_primary_button_text ?? 'Read Articles' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <a href="{{ $blogPage->hero_secondary_button_link ?? '#featured-blog' }}" class="btn btn-outline-custom">
                                {{ $blogPage->hero_secondary_button_text ?? 'Featured Story' }}
                            </a>
                        </div>

                        <nav aria-label="breadcrumb" class="blog-breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="blog-hero-side">
                        <div class="blog-feature-note">
                            <div class="blog-feature-icon"><i class="bi {{ $blogPage->hero_feature_icon ?? 'bi-pen-fill' }}"></i></div>
                            <div>
                                <h4>{{ $blogPage->hero_feature_title ?? 'Impact Stories' }}</h4>
                                <p>{{ $blogPage->hero_feature_text ?? 'Latest updates, campaign reports, and awareness content.' }}</p>
                            </div>
                        </div>

                        <div class="blog-topic-grid">
                            @foreach($heroTopics as [$icon, $title])
                                <div class="blog-topic-card">
                                    <i class="bi {{ $icon }}"></i>
                                    <h5>{{ $title }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($featuredBlog)
    <section class="section-padding featured-blog-section" id="featured-blog">
        <div class="container">
            <div class="featured-blog-box">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5">
                        <div class="featured-blog-img">
                            <img src="{{ $featuredBlog->image ? asset('uploads/blog/' . $featuredBlog->image) : $fallbackImage }}" alt="{{ $featuredBlog->title }}">
                            <span class="featured-blog-tag">Featured</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="featured-blog-content">
                            <span class="section-badge featured-blog-badge">
                                <i class="bi bi-stars"></i>
                                {{ $blogPage->featured_badge ?? 'Featured Article' }}
                            </span>
                            <div class="blog-meta">
                                <span><i class="bi bi-calendar3"></i> {{ $featuredBlog->published_date }}</span>
                                <span><i class="bi bi-person-circle"></i> {{ $featuredBlog->author }}</span>
                                <span><i class="bi bi-folder2-open"></i> {{ $featuredBlog->category }}</span>
                            </div>
                            <h2>{{ $featuredBlog->title }}</h2>
                            <p>{{ $featuredBlog->short_description }}</p>
                            <a href="{{ route('frontend.blog.show', $featuredBlog->slug) }}" class="btn btn-primary-custom">
                                Read Full Story
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<section class="section-padding blog-list-section" id="blog-list">
    <div class="container">
        <div class="blog-list-head text-center mb-5">
            <span class="section-badge blog-list-badge">
                <i class="bi bi-journal-text"></i>
                {{ $blogPage->list_badge ?? 'Latest Updates' }}
            </span>
            <h2 class="section-title">{{ $blogPage->list_title ?? 'Articles, News & Activity Reports' }}</h2>
            <p class="section-text mx-auto">{{ $blogPage->list_description ?? 'Explore our latest NGO updates, awareness content, event reports, and community development stories.' }}</p>

            <div class="blog-filter-chips">
                @foreach($filters as $filter)
                    <button type="button" class="{{ $loop->first ? 'active' : '' }}">{{ $filter }}</button>
                @endforeach
            </div>
        </div>

        <div class="row g-4">
            @forelse($blogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <article class="blog-card">
                        <div class="blog-card-img">
                            <img src="{{ $blog->image ? asset('uploads/blog/' . $blog->image) : $fallbackImage }}" alt="{{ $blog->title }}">
                            <span class="blog-category">{{ $blog->category }}</span>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span><i class="bi bi-calendar3"></i> {{ $blog->published_date }}</span>
                                <span><i class="bi bi-person-circle"></i> {{ $blog->author }}</span>
                            </div>
                            <h4><a href="{{ route('frontend.blog.show', $blog->slug) }}">{{ $blog->title }}</a></h4>
                            <p>{{ $blog->short_description }}</p>
                            <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="blog-read-link">
                                Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="section-text mx-auto">No blog articles available right now.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section-padding blog-topics-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge blog-topics-badge">
                <i class="bi bi-tags-fill"></i>
                {{ $blogPage->topics_badge ?? 'Blog Topics' }}
            </span>
            <h2 class="section-title">{{ $blogPage->topics_title ?? 'Awareness & Update Categories' }}</h2>
            <p class="section-text mx-auto">{{ $blogPage->topics_description ?? 'We publish useful content across social development and welfare topics.' }}</p>
        </div>

        <div class="row g-4">
            @forelse($blogTopics as $topic)
                <div class="col-md-6 col-lg-3">
                    <div class="topic-card">
                        <i class="bi {{ $topic->icon }}"></i>
                        <h4>{{ $topic->title }}</h4>
                        <p>{{ $topic->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="section-text mx-auto">No blog topics available right now.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="blog-newsletter-section">
    <div class="container">
        <div class="blog-newsletter-box">
            <div>
                <span>{{ $blogPage->newsletter_badge ?? 'Stay Updated' }}</span>
                <h2>{{ $blogPage->newsletter_title ?? 'Get Updates From URMILA Development Foundation' }}</h2>
                <p>{{ $blogPage->newsletter_description ?? 'Subscribe for activity reports, awareness articles, community stories, and campaign updates.' }}</p>
            </div>
            <form class="newsletter-form">
                <input type="email" placeholder="{{ $blogPage->newsletter_placeholder ?? 'Enter your email address' }}">
                <button type="submit">
                    {{ $blogPage->newsletter_button_text ?? 'Subscribe' }}
                    <i class="bi bi-send-fill"></i>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
