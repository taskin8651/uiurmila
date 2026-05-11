@extends('frontend.master')

@section('content')

@php
    $campaignPage = $campaignPage ?? null;
    $featuredCampaign = $featuredCampaign ?? null;
@endphp

<!-- EVENTS PAGE HERO START -->
<section class="events-page-hero">
    <span class="events-hero-shape events-shape-one"></span>
    <span class="events-hero-shape events-shape-two"></span>

    <div class="container">
        <div class="events-hero-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="events-hero-content">
                        <span class="section-badge events-hero-badge">
                            <i class="bi bi-calendar-event-fill"></i>
                            {{ $campaignPage?->hero_badge ?? 'Campaigns & Events' }}
                        </span>

                        <h1>{{ $campaignPage?->hero_title ?? 'Social Campaigns That Create Real Change' }}</h1>

                        <p>
                            {{ $campaignPage?->hero_description ?? 'Explore our past and upcoming campaigns including health camps, blood donation drives, awareness rallies, food distribution, skill training, plantation drives, and education support programs.' }}
                        </p>

                        <div class="events-hero-actions">
                            <a href="{{ $campaignPage?->hero_primary_button_link ?? '#events-list' }}" class="btn btn-primary-custom">
                                {{ $campaignPage?->hero_primary_button_text ?? 'View Events' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                            <a href="{{ $campaignPage?->hero_secondary_button_link ?? url('/volunteer') }}" class="btn btn-outline-custom">
                                {{ $campaignPage?->hero_secondary_button_text ?? 'Join Campaign' }}
                            </a>
                        </div>

                        <nav aria-label="breadcrumb" class="events-breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Campaigns</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="events-hero-side">
                        <div class="events-feature-card">
                            <div class="events-feature-icon">
                                <i class="{{ $campaignPage?->hero_feature_icon ?? 'bi bi-megaphone-fill' }}"></i>
                            </div>

                            <div>
                                <h4>{{ $campaignPage?->hero_feature_title ?? 'Active Community Drives' }}</h4>
                                <p>{{ $campaignPage?->hero_feature_text ?? 'Join our campaigns and support people through meaningful action.' }}</p>
                            </div>
                        </div>

                        <div class="events-mini-grid">
                            @foreach([
                                [$campaignPage?->hero_mini_one_icon ?? 'bi bi-heart-pulse-fill', $campaignPage?->hero_mini_one_title ?? 'Health Camp'],
                                [$campaignPage?->hero_mini_two_icon ?? 'bi bi-droplet-fill', $campaignPage?->hero_mini_two_title ?? 'Blood Donation'],
                                [$campaignPage?->hero_mini_three_icon ?? 'bi bi-tree-fill', $campaignPage?->hero_mini_three_title ?? 'Plantation'],
                                [$campaignPage?->hero_mini_four_icon ?? 'bi bi-book-fill', $campaignPage?->hero_mini_four_title ?? 'Education'],
                            ] as $mini)
                                <div class="events-mini-card">
                                    <i class="{{ $mini[0] }}"></i>
                                    <h5>{{ $mini[1] }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- EVENTS PAGE HERO END -->


<!-- FEATURED CAMPAIGN START -->
<section class="section-padding featured-campaign-section">
    <div class="container">
        <div class="featured-campaign-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="featured-campaign-img">
                        <img
                            src="{{ $featuredCampaign && $featuredCampaign->image ? asset('uploads/campaigns/' . $featuredCampaign->image) : asset('assets/img/gallery/gallery (11).jpeg') }}"
                            alt="{{ $featuredCampaign?->title ?? 'Free Health Camp' }}"
                        >
                        <span class="featured-status">{{ $featuredCampaign?->status_label ?? 'Upcoming' }}</span>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="featured-campaign-content">
                        <span class="section-badge featured-badge">
                            <i class="bi bi-stars"></i>
                            {{ $featuredCampaign?->badge ?? 'Featured Campaign' }}
                        </span>

                        <h2>{{ $featuredCampaign?->title ?? 'Free Health Camp for Local Communities' }}</h2>

                        <p>
                            {{ $featuredCampaign?->description ?? 'A community-focused health camp to provide basic checkups, medical awareness, and wellness support for underserved families.' }}
                        </p>

                        <div class="featured-info">
                            <span><i class="bi bi-calendar3"></i> {{ $featuredCampaign?->event_date ?? '12 June 2026' }}</span>
                            <span><i class="bi bi-geo-alt"></i> {{ $featuredCampaign?->location ?? 'Community Center' }}</span>
                            <span><i class="bi bi-people-fill"></i> {{ $featuredCampaign?->audience ?? 'Open for All' }}</span>
                        </div>

                        <div class="featured-actions">
                            <a href="{{ $featuredCampaign?->primary_button_link ?? url('/campaigns') }}" class="btn btn-primary-custom">
                                {{ $featuredCampaign?->primary_button_text ?? 'View Details' }}
                            </a>

                            <a href="{{ $featuredCampaign?->secondary_button_link ?? url('/volunteer') }}" class="btn btn-outline-custom">
                                {{ $featuredCampaign?->secondary_button_text ?? 'Join Campaign' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FEATURED CAMPAIGN END -->


<!-- EVENTS LIST START -->
<section class="section-padding events-list-section" id="events-list">
    <div class="container">
        <div class="events-list-head text-center mb-5">
            <span class="section-badge events-list-badge">
                <i class="bi bi-calendar2-week"></i>
                {{ $campaignPage?->events_badge ?? 'Activities' }}
            </span>

            <h2 class="section-title">{{ $campaignPage?->events_title ?? 'Past & Upcoming Events' }}</h2>

            <p class="section-text mx-auto">
                {{ $campaignPage?->events_description ?? 'Stay connected with our latest campaigns, community activities, and social welfare initiatives.' }}
            </p>

            <div class="event-filter-chips">
                @foreach([
                    $campaignPage?->filter_one ?? 'All Events',
                    $campaignPage?->filter_two ?? 'Upcoming',
                    $campaignPage?->filter_three ?? 'Past',
                    $campaignPage?->filter_four ?? 'Health',
                    $campaignPage?->filter_five ?? 'Education',
                ] as $index => $filter)
                    <button type="button" class="{{ $index === 0 ? 'active' : '' }}">{{ $filter }}</button>
                @endforeach
            </div>
        </div>

        <div class="row g-4">
            @forelse($campaignEvents as $event)
                <div class="col-md-6 col-lg-4">
                    <div class="campaign-card">
                        <div class="campaign-img">
                            <img
                                src="{{ $event->image ? asset('uploads/campaigns/' . $event->image) : asset('assets/img/gallery/gallery (12).jpeg') }}"
                                alt="{{ $event->title }}"
                            >

                            <span class="campaign-status {{ $event->status_class ?? 'upcoming' }}">{{ $event->status_label ?? 'Upcoming' }}</span>
                            <span class="campaign-category">{{ $event->category ?? 'Campaign' }}</span>
                        </div>

                        <div class="campaign-content">
                            <div class="campaign-meta">
                                <span><i class="bi bi-calendar3"></i> {{ $event->event_date ?? '-' }}</span>
                                <span><i class="bi bi-geo-alt"></i> {{ $event->location ?? '-' }}</span>
                            </div>

                            <h4>{{ $event->title }}</h4>
                            <p>{{ $event->description }}</p>

                            <div class="campaign-gallery-preview">
                                @foreach([$event->gallery_image_one, $event->gallery_image_two, $event->gallery_image_three] as $galleryImage)
                                    @if($galleryImage)
                                        <img src="{{ asset('uploads/campaigns/' . $galleryImage) }}" alt="">
                                    @endif
                                @endforeach
                                @if($event->gallery_more_count)
                                    <span>{{ $event->gallery_more_count }}</span>
                                @endif
                            </div>

                            <div class="campaign-actions">
                                <a href="{{ $event->primary_button_link ?? '#' }}">
                                    {{ $event->primary_button_text ?? 'View Details' }}
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                                <a href="{{ $event->secondary_button_link ?? '#' }}">
                                    {{ $event->secondary_button_text ?? 'Join' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @foreach([
                    ['upcoming','Healthcare','12 June 2026','Local Area','Free health check up','Free medical checkup and health awareness camp for local communities.'],
                    ['upcoming','Donation','25 June 2026','City Hall','School activities','A blood donation drive to support emergency healthcare needs.'],
                    ['past','Environment','5 July 2026','Public Park','Painting competition','Environmental awareness and tree plantation activity for greener future.'],
                ] as $fallback)
                    <div class="col-md-6 col-lg-4">
                        <div class="campaign-card">
                            <div class="campaign-img">
                                <img src="{{ asset('assets/img/gallery/gallery (12).jpeg') }}" alt="{{ $fallback[4] }}">
                                <span class="campaign-status {{ $fallback[0] }}">{{ ucfirst($fallback[0]) }}</span>
                                <span class="campaign-category">{{ $fallback[1] }}</span>
                            </div>

                            <div class="campaign-content">
                                <div class="campaign-meta">
                                    <span><i class="bi bi-calendar3"></i> {{ $fallback[2] }}</span>
                                    <span><i class="bi bi-geo-alt"></i> {{ $fallback[3] }}</span>
                                </div>
                                <h4>{{ $fallback[4] }}</h4>
                                <p>{{ $fallback[5] }}</p>
                                <div class="campaign-actions">
                                    <a href="{{ url('/campaigns') }}">View Details <i class="bi bi-arrow-right"></i></a>
                                    <a href="{{ url('/volunteer') }}">Join</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
<!-- EVENTS LIST END -->


<!-- EVENT GALLERY STRIP START -->
<section class="section-padding event-gallery-strip-section">
    <div class="container">
        <div class="event-gallery-strip">
            <div class="event-gallery-content">
                <span class="section-badge gallery-strip-badge">
                    <i class="bi bi-images"></i>
                    {{ $campaignPage?->gallery_badge ?? 'Event Gallery' }}
                </span>

                <h2>{{ $campaignPage?->gallery_title ?? 'Explore Moments From Our Campaigns' }}</h2>

                <p>
                    {{ $campaignPage?->gallery_description ?? 'View photos from our social activities, health camps, donation drives, awareness rallies, and community development programs.' }}
                </p>

                <a href="{{ $campaignPage?->gallery_button_link ?? url('/gallery') }}" class="btn btn-primary-custom">
                    {{ $campaignPage?->gallery_button_text ?? 'View Gallery' }}
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="event-gallery-grid">
                @foreach([
                    $campaignPage?->gallery_image_one ?? 'assets/img/gallery/gallery (10).jpeg',
                    $campaignPage?->gallery_image_two ?? 'assets/img/gallery/gallery (12).jpeg',
                    $campaignPage?->gallery_image_three ?? 'assets/img/gallery/gallery (10).jpeg',
                    $campaignPage?->gallery_image_four ?? 'assets/img/gallery/gallery (12).jpeg',
                ] as $galleryImage)
                    <img src="{{ Str::startsWith($galleryImage, ['http://', 'https://']) ? $galleryImage : asset($galleryImage) }}" alt="Gallery">
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- EVENT GALLERY STRIP END -->


<!-- EVENT CTA START -->
<section class="event-cta-section">
    <div class="container">
        <div class="event-cta-box">
            <div>
                <span>{{ $campaignPage?->cta_badge ?? 'Join Our Campaigns' }}</span>
                <h2>{{ $campaignPage?->cta_title ?? 'Support Our Upcoming Social Activities' }}</h2>
                <p>{{ $campaignPage?->cta_description ?? 'Become a volunteer, donor, or campaign partner and help us reach more people.' }}</p>
            </div>

            <div class="event-cta-actions">
                <a href="{{ $campaignPage?->cta_primary_button_link ?? url('/volunteer') }}" class="btn btn-light-custom">
                    {{ $campaignPage?->cta_primary_button_text ?? 'Join Campaign' }}
                </a>

                <a href="{{ $campaignPage?->cta_secondary_button_link ?? url('/donate') }}" class="btn btn-outline-light-custom">
                    {{ $campaignPage?->cta_secondary_button_text ?? 'Support This Cause' }}
                </a>
            </div>
        </div>
    </div>
</section>
<!-- EVENT CTA END -->

@endsection
