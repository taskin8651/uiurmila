@extends('frontend.master')

@section('content')

@php
    $galleryPage = $galleryPage ?? null;
@endphp

<!-- GALLERY HERO START -->
<section class="gallery-page-hero">
    <span class="gallery-hero-shape gallery-shape-one"></span>
    <span class="gallery-hero-shape gallery-shape-two"></span>

    <div class="container">
        <div class="gallery-hero-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="gallery-hero-content">
                        <span class="section-badge gallery-hero-badge">
                            <i class="bi bi-images"></i>
                            {{ $galleryPage?->hero_badge ?? 'Activity Gallery' }}
                        </span>

                        <h1>{{ $galleryPage?->hero_title ?? 'Moments of Service, Hope and Social Impact' }}</h1>

                        <p>{{ $galleryPage?->hero_description ?? 'Explore photos and videos from our campaigns, events, health camps, education drives, food distribution, awareness programs, and community development activities.' }}</p>

                        <div class="gallery-hero-actions">
                            <a href="{{ $galleryPage?->hero_primary_button_link ?? '#photo-gallery' }}" class="btn btn-primary-custom">
                                {{ $galleryPage?->hero_primary_button_text ?? 'View Gallery' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <a href="{{ $galleryPage?->hero_secondary_button_link ?? '#video-gallery' }}" class="btn btn-outline-custom">
                                {{ $galleryPage?->hero_secondary_button_text ?? 'Watch Videos' }}
                            </a>
                        </div>

                        <nav aria-label="breadcrumb" class="gallery-breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="gallery-hero-side">
                        <div class="gallery-feature-card">
                            <div class="gallery-feature-icon">
                                <i class="{{ $galleryPage?->hero_feature_icon ?? 'bi bi-camera-fill' }}"></i>
                            </div>
                            <div>
                                <h4>{{ $galleryPage?->hero_feature_title ?? 'Captured Impact' }}</h4>
                                <p>{{ $galleryPage?->hero_feature_text ?? 'Real moments from campaigns, volunteers, and communities.' }}</p>
                            </div>
                        </div>

                        <div class="gallery-hero-grid">
                            @foreach([
                                $galleryPage?->hero_image_one ?? 'assets/img/gallery/gallery (11).jpeg',
                                $galleryPage?->hero_image_two ?? 'assets/img/gallery/gallery (12).jpeg',
                                $galleryPage?->hero_image_three ?? 'assets/img/gallery/gallery (13).jpeg',
                                $galleryPage?->hero_image_four ?? 'assets/img/gallery/gallery (14).jpeg',
                            ] as $image)
                                <img src="{{ Str::startsWith($image, ['http://', 'https://']) ? $image : asset($image) }}" alt="Gallery">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- GALLERY HERO END -->


<!-- PHOTO GALLERY START -->
<section class="section-padding photo-gallery-section" id="photo-gallery">
    <div class="container">
        <div class="gallery-head text-center mb-5">
            <span class="section-badge photo-gallery-badge">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                {{ $galleryPage?->photos_badge ?? 'Photo Gallery' }}
            </span>

            <h2 class="section-title">{{ $galleryPage?->photos_title ?? 'Photo Highlights' }}</h2>

            <p class="section-text mx-auto">
                {{ $galleryPage?->photos_description ?? "Browse category-wise photos from our foundation's programs, events, campaigns, and community activities." }}
            </p>

            <div class="gallery-filter-chips">
                @foreach([
                    $galleryPage?->filter_one ?? 'All',
                    $galleryPage?->filter_two ?? 'Health Camps',
                    $galleryPage?->filter_three ?? 'Education',
                    $galleryPage?->filter_four ?? 'Food Support',
                    $galleryPage?->filter_five ?? 'Plantation',
                    $galleryPage?->filter_six ?? 'Awareness',
                ] as $index => $filter)
                    <button type="button" class="{{ $index === 0 ? 'active' : '' }}">{{ $filter }}</button>
                @endforeach
            </div>
        </div>

        <div class="premium-gallery-grid">
            @forelse($galleryPhotos as $photo)
                <a href="#gallery-img-{{ $photo->id }}" class="premium-gallery-card {{ $photo->card_class }}">
                    <img src="{{ $photo->image ? asset('uploads/gallery/' . $photo->image) : asset('assets/img/gallery/gallery (10).jpeg') }}" alt="{{ $photo->title }}">
                    <div class="gallery-card-overlay">
                        <span>{{ $photo->title }}</span>
                        <i class="bi bi-plus-lg"></i>
                    </div>
                </a>
            @empty
                @foreach([
                    ['gallery (10).jpeg', 'Health Camp', 'tall'],
                    ['gallery (2).jpeg', 'Education Support', ''],
                    ['gallery (3).jpeg', 'Food Distribution', 'wide'],
                    ['gallery (4).jpeg', 'Plantation Drive', ''],
                ] as $fallback)
                    <a href="#photo-gallery" class="premium-gallery-card {{ $fallback[2] }}">
                        <img src="{{ asset('assets/img/gallery/' . $fallback[0]) }}" alt="{{ $fallback[1] }}">
                        <div class="gallery-card-overlay">
                            <span>{{ $fallback[1] }}</span>
                            <i class="bi bi-plus-lg"></i>
                        </div>
                    </a>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
<!-- PHOTO GALLERY END -->

<!-- CSS LIGHTBOX START -->
@foreach($galleryPhotos as $photo)
    <div id="gallery-img-{{ $photo->id }}" class="gallery-lightbox">
        <a href="#photo-gallery" class="lightbox-close"><i class="bi bi-x-lg"></i></a>
        <img src="{{ $photo->image ? asset('uploads/gallery/' . $photo->image) : asset('assets/img/gallery/gallery (10).jpeg') }}" alt="{{ $photo->title }}">
    </div>
@endforeach
<!-- CSS LIGHTBOX END -->


<!-- EVENT-WISE GALLERY START -->
<section class="section-padding event-wise-gallery-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge event-wise-badge">
                <i class="bi bi-calendar-event"></i>
                {{ $galleryPage?->albums_badge ?? 'Event-Wise Gallery' }}
            </span>
            <h2 class="section-title">{{ $galleryPage?->albums_title ?? 'Gallery by Campaigns' }}</h2>
            <p class="section-text mx-auto">{{ $galleryPage?->albums_description ?? 'View photos grouped by foundation activities and campaign categories.' }}</p>
        </div>

        <div class="row g-4">
            @forelse($galleryAlbums as $album)
                <div class="col-md-6 col-lg-4">
                    <div class="event-gallery-card">
                        <div class="event-gallery-cover">
                            <img src="{{ $album->cover_image ? asset('uploads/gallery/' . $album->cover_image) : asset('assets/img/gallery/gallery (12).jpeg') }}" alt="{{ $album->title }}">
                            <span>{{ $album->photo_count ?? '12 Photos' }}</span>
                        </div>
                        <div class="event-gallery-content">
                            <span class="event-gallery-date"><i class="bi bi-calendar3"></i> {{ $album->album_date ?? '-' }}</span>
                            <h4>{{ $album->title }}</h4>
                            <p>{{ $album->description }}</p>
                            <a href="{{ $album->button_link ?? '#' }}">
                                {{ $album->button_text ?? 'View Album' }}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-6 col-lg-4">
                    <div class="event-gallery-card">
                        <div class="event-gallery-cover">
                            <img src="{{ asset('assets/img/gallery/gallery (12).jpeg') }}" alt="Free Health Camp">
                            <span>12 Photos</span>
                        </div>
                        <div class="event-gallery-content">
                            <span class="event-gallery-date"><i class="bi bi-calendar3"></i> 12 June 2026</span>
                            <h4>Free health check up</h4>
                            <p>Medical support, checkups, and awareness photos.</p>
                            <a href="{{ url('/gallery') }}">View Album <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- EVENT-WISE GALLERY END -->


<!-- VIDEO GALLERY START -->
<section class="section-padding video-gallery-section" id="video-gallery">
    <div class="container">
        <div class="video-gallery-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="video-gallery-content">
                        <span class="section-badge video-badge">
                            <i class="bi bi-play-circle-fill"></i>
                            {{ $galleryPage?->videos_badge ?? 'Video Gallery' }}
                        </span>
                        <h2>{{ $galleryPage?->videos_title ?? 'Watch Our Activities in Action' }}</h2>
                        <p>{{ $galleryPage?->videos_description ?? 'Video section can include campaign highlights, event coverage, awareness messages, interviews, and foundation activity clips.' }}</p>
                        <a href="{{ $galleryPage?->videos_button_link ?? url('/contact') }}" class="btn btn-primary-custom">
                            {{ $galleryPage?->videos_button_text ?? 'Share Media' }}
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="video-grid">
                        @forelse($galleryVideos as $video)
                            <div class="video-card">
                                <div class="video-thumb">
                                    <img src="{{ $video->thumbnail ? asset('uploads/gallery/' . $video->thumbnail) : asset('assets/img/gallery/gallery-4.jpg') }}" alt="{{ $video->title }}">
                                    <a href="{{ $video->video_link ?? '#' }}" class="video-play"><i class="bi bi-play-fill"></i></a>
                                </div>
                                <h4>{{ $video->title }}</h4>
                            </div>
                        @empty
                            <div class="video-card">
                                <div class="video-thumb">
                                    <img src="{{ asset('assets/img/gallery/gallery-4.jpg') }}" alt="Video Thumbnail">
                                    <a href="#" class="video-play"><i class="bi bi-play-fill"></i></a>
                                </div>
                                <h4>Health Camp Highlights</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- VIDEO GALLERY END -->


<!-- GALLERY CTA START -->
<section class="gallery-cta-section">
    <div class="container">
        <div class="gallery-cta-box">
            <div>
                <span>{{ $galleryPage?->cta_badge ?? 'Join Our Activities' }}</span>
                <h2>{{ $galleryPage?->cta_title ?? 'Become a Part of Our Next Social Campaign' }}</h2>
                <p>{{ $galleryPage?->cta_description ?? 'Volunteer, donate, or collaborate with URMILA Development Foundation to create meaningful social impact.' }}</p>
            </div>
            <div class="gallery-cta-actions">
                <a href="{{ $galleryPage?->cta_primary_button_link ?? url('/volunteer') }}" class="btn btn-light-custom">
                    {{ $galleryPage?->cta_primary_button_text ?? 'Become Volunteer' }}
                </a>
                <a href="{{ $galleryPage?->cta_secondary_button_link ?? url('/donate') }}" class="btn btn-outline-light-custom">
                    {{ $galleryPage?->cta_secondary_button_text ?? 'Donate Now' }}
                </a>
            </div>
        </div>
    </div>
</section>
<!-- GALLERY CTA END -->

@endsection
