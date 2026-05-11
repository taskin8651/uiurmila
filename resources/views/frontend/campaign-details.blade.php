@extends('frontend.master')

@section('content')

@php
    $campaignPage = $campaignPage ?? null;
    $event = $campaignEvent;
    $mainImage = $event->image ? asset('uploads/campaigns/' . $event->image) : asset('assets/img/gallery/gallery (12).jpeg');
    $galleryImages = collect([
        $event->gallery_image_one,
        $event->gallery_image_two,
        $event->gallery_image_three,
    ])->filter();
@endphp

<!-- EVENT DETAIL HERO START -->
<section class="event-detail-hero">
    <div class="container">
        <div class="event-detail-hero-box text-center">
            <span class="section-badge event-detail-badge">
                <i class="bi bi-calendar-event"></i>
                {{ $event->category ?? 'Campaign Details' }}
            </span>

            <h1>{{ $event->title }}</h1>

            <p>{{ $event->description }}</p>

            <div class="event-detail-meta">
                <span>
                    <i class="bi bi-calendar3"></i>
                    {{ $event->event_date ?? '-' }}
                </span>

                <span>
                    <i class="bi bi-geo-alt"></i>
                    {{ $event->location ?? '-' }}
                </span>

                <span>
                    <i class="bi bi-tag"></i>
                    {{ $event->category ?? 'Campaign' }}
                </span>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('frontend.campaigns') }}">Campaigns</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $event->title }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- EVENT DETAIL HERO END -->


<!-- EVENT DETAIL CONTENT START -->
<section class="section-padding event-detail-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="event-detail-main-card">
                    <div class="event-detail-image">
                        <img src="{{ $mainImage }}" alt="{{ $event->title }}">
                        <span>{{ $event->status_label ?? 'Campaign' }}</span>
                    </div>

                    <div class="event-detail-content">
                        <h2>About This Campaign</h2>

                        <p>{{ $event->description }}</p>

                        <p>
                            This campaign is part of URMILA Development Foundation's ongoing community welfare work.
                            Our aim is to support local people through awareness, participation, and meaningful social action.
                        </p>

                        <div class="event-detail-points">
                            <div>
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $event->category ?? 'Community support' }}
                            </div>

                            <div>
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $event->location ? 'Organized at ' . $event->location : 'Local community participation' }}
                            </div>

                            <div>
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $event->status_label ?? 'Active campaign update' }}
                            </div>
                        </div>

                        @if($galleryImages->count())
                            <h3>Photo Highlights</h3>

                            <div class="event-detail-gallery">
                                @foreach($galleryImages as $galleryImage)
                                    <img src="{{ asset('uploads/campaigns/' . $galleryImage) }}" alt="{{ $event->title }}">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="event-detail-sidebar">
                    <div class="event-info-card">
                        <h4>Event Information</h4>

                        <ul>
                            <li>
                                <i class="bi bi-calendar3"></i>
                                <div>
                                    <strong>Date</strong>
                                    <span>{{ $event->event_date ?? '-' }}</span>
                                </div>
                            </li>

                            <li>
                                <i class="bi bi-clock"></i>
                                <div>
                                    <strong>Status</strong>
                                    <span>{{ $event->status_label ?? '-' }}</span>
                                </div>
                            </li>

                            <li>
                                <i class="bi bi-geo-alt"></i>
                                <div>
                                    <strong>Location</strong>
                                    <span>{{ $event->location ?? '-' }}</span>
                                </div>
                            </li>

                            <li>
                                <i class="bi bi-people"></i>
                                <div>
                                    <strong>Category</strong>
                                    <span>{{ $event->category ?? 'Campaign' }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="event-join-card">
                        <span>{{ $campaignPage?->cta_badge ?? 'Join Campaign' }}</span>

                        <h4>{{ $campaignPage?->cta_title ?? 'Want to Support This Cause?' }}</h4>

                        <p>
                            {{ $campaignPage?->cta_description ?? 'Become a volunteer or support this campaign through donation and community participation.' }}
                        </p>

                        <div class="event-join-actions">
                            <a href="{{ $event->secondary_button_link ?: ($campaignPage?->cta_primary_button_link ?? 'volunteer.html') }}" class="btn btn-light-custom">
                                {{ $event->secondary_button_text ?: ($campaignPage?->cta_primary_button_text ?? 'Join as Volunteer') }}
                            </a>

                            <a href="{{ $campaignPage?->cta_secondary_button_link ?? route('frontend.donate') }}" class="btn btn-outline-light-custom">
                                {{ $campaignPage?->cta_secondary_button_text ?? 'Support Cause' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- EVENT DETAIL CONTENT END -->

@endsection
