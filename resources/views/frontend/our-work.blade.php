@extends('frontend.master')

@section('content')

@php
    $ourWork = $ourWork ?? null;
@endphp

<!-- PROGRAM PAGE HERO START -->
<section class="program-page-hero">
    <span class="program-hero-shape shape-one"></span>
    <span class="program-hero-shape shape-two"></span>

    <div class="container">
        <div class="program-hero-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="program-hero-content">
                        <span class="section-badge program-hero-badge">
                            <i class="bi bi-grid-1x2-fill"></i>
                            {{ $ourWork?->hero_badge ?? 'Our Work & Programs' }}
                        </span>

                        <h1>{{ $ourWork?->hero_title ?? 'Creating Impact Through Community Programs' }}</h1>

                        <p>
                            {{ $ourWork?->hero_description ?? 'We work across education, healthcare, women empowerment, food support, environment, awareness campaigns, and community welfare to create meaningful social change.' }}
                        </p>

                        <div class="program-hero-actions">
                            <a href="{{ $ourWork?->hero_primary_button_link ?? '#program-categories' }}" class="btn btn-primary-custom">
                                {{ $ourWork?->hero_primary_button_text ?? 'Explore Programs' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                            <a href="{{ $ourWork?->hero_secondary_button_link ?? url('/volunteer') }}" class="btn btn-outline-custom">
                                {{ $ourWork?->hero_secondary_button_text ?? 'Become Volunteer' }}
                            </a>
                        </div>

                        <nav aria-label="breadcrumb" class="program-breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Our Work
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="program-hero-side">
                        <div class="program-impact-card main-impact-card">
                            <div class="program-impact-icon">
                                <i class="{{ $ourWork?->hero_impact_icon ?? 'bi bi-heart-fill' }}"></i>
                            </div>

                            <div>
                                <h4>{{ $ourWork?->hero_impact_title ?? '10+ Focus Areas' }}</h4>
                                <p>{{ $ourWork?->hero_impact_text ?? 'Serving communities through multiple social initiatives.' }}</p>
                            </div>
                        </div>

                        <div class="program-hero-mini-grid">
                            @foreach([
                                [$ourWork?->hero_mini_one_icon ?? 'bi bi-book-fill', $ourWork?->hero_mini_one_title ?? 'Education'],
                                [$ourWork?->hero_mini_two_icon ?? 'bi bi-hospital-fill', $ourWork?->hero_mini_two_title ?? 'Healthcare'],
                                [$ourWork?->hero_mini_three_icon ?? 'bi bi-person-hearts', $ourWork?->hero_mini_three_title ?? 'Women Support'],
                                [$ourWork?->hero_mini_four_icon ?? 'bi bi-tree-fill', $ourWork?->hero_mini_four_title ?? 'Environment'],
                            ] as $mini)
                                <div class="program-mini-card">
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
<!-- PROGRAM PAGE HERO END -->


<!-- PROGRAM CATEGORY START -->
<section class="section-padding program-category-section" id="program-categories">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge program-badge">
                <i class="bi bi-stars"></i>
                {{ $ourWork?->categories_badge ?? 'Key Focus Areas' }}
            </span>

            <h2 class="section-title">{{ $ourWork?->categories_title ?? 'Major Fields of Service' }}</h2>

            <p class="section-text mx-auto">
                {{ $ourWork?->categories_description ?? 'Our programs are designed to address social needs through education, health, empowerment, awareness, and community welfare.' }}
            </p>
        </div>

        <div class="row g-4">
            @forelse($categories as $category)
                <div class="col-md-6 col-lg-4">
                    <div class="work-card">
                        <div class="work-icon">
                            <i class="{{ $category->icon ?? 'bi bi-book-fill' }}"></i>
                        </div>

                        <h4>{{ $category->title }}</h4>
                        <p>{{ $category->description }}</p>

                        <div class="work-meta">
                            <span><i class="{{ $category->meta_one_icon ?? 'bi bi-people-fill' }}"></i> {{ $category->meta_one_text ?? 'Community' }}</span>
                            <span><i class="{{ $category->meta_two_icon ?? 'bi bi-graph-up' }}"></i> {{ $category->meta_two_text ?? 'Impact' }}</span>
                        </div>

                        <a href="{{ $category->button_link ?? '#' }}">
                            {{ $category->button_text ?? 'View Program' }} <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                @foreach([
                    ['bi bi-book-fill', 'Education Support', 'Learning support, education awareness, study material, and guidance for children and communities.', 'Children', 'Learning', '#education'],
                    ['bi bi-hospital-fill', 'Healthcare Camps', 'Medical camps, health checkups, awareness drives, and preventive healthcare support.', 'Health', 'Care', '#healthcare'],
                    ['bi bi-person-hearts', 'Women Empowerment', 'Skill development, awareness, social participation, and support for women-led growth.', 'Skills', 'Support', '#women'],
                ] as $fallback)
                    <div class="col-md-6 col-lg-4">
                        <div class="work-card">
                            <div class="work-icon"><i class="{{ $fallback[0] }}"></i></div>
                            <h4>{{ $fallback[1] }}</h4>
                            <p>{{ $fallback[2] }}</p>
                            <div class="work-meta">
                                <span><i class="bi bi-people-fill"></i> {{ $fallback[3] }}</span>
                                <span><i class="bi bi-graph-up"></i> {{ $fallback[4] }}</span>
                            </div>
                            <a href="{{ $fallback[5] }}">View Program <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
<!-- PROGRAM CATEGORY END -->


<!-- PROGRAM DETAILS START -->
<section class="section-padding program-details-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge details-badge">
                <i class="bi bi-list-check"></i>
                {{ $ourWork?->details_badge ?? 'Program Details' }}
            </span>

            <h2 class="section-title">{{ $ourWork?->details_title ?? 'How We Serve Communities' }}</h2>
        </div>

        @forelse($details as $detail)
            <div class="program-detail-card {{ $detail->is_reverse ? 'reverse-card' : '' }}" id="{{ $detail->section_id }}">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5 {{ $detail->is_reverse ? 'order-lg-2' : '' }}">
                        <div class="program-detail-img">
                            <img
                                src="{{ $detail->image ? asset('uploads/our-work/' . $detail->image) : asset('assets/img/gallery/gallery (13).jpeg') }}"
                                alt="{{ $detail->title }}"
                            >
                        </div>
                    </div>

                    <div class="col-lg-7 {{ $detail->is_reverse ? 'order-lg-1' : '' }}">
                        <div class="program-detail-content">
                            <span class="program-label">{{ $detail->label ?? $detail->title }}</span>
                            <h3>{{ $detail->title }}</h3>
                            <p>{{ $detail->description }}</p>

                            <div class="program-info-grid">
                                <div>
                                    <strong>{{ $detail->beneficiaries_label ?? 'Beneficiaries' }}</strong>
                                    <span>{{ $detail->beneficiaries_text ?? 'Local communities' }}</span>
                                </div>

                                <div>
                                    <strong>{{ $detail->impact_label ?? 'Impact' }}</strong>
                                    <span>{{ $detail->impact_text ?? 'Positive community impact' }}</span>
                                </div>
                            </div>

                            @if($detail->button_text)
                                <a href="{{ $detail->button_link ?? '#' }}" class="program-btn">
                                    {{ $detail->button_text }}
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="program-detail-card" id="education">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5">
                        <div class="program-detail-img">
                            <img src="{{ asset('assets/img/gallery/gallery (13).jpeg') }}" alt="Education Support">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="program-detail-content">
                            <span class="program-label">Education Support</span>
                            <h3>Helping Children Learn and Grow</h3>
                            <p>We support children and communities through educational awareness, learning resources, guidance, and academic support programs.</p>
                            <div class="program-info-grid">
                                <div><strong>Beneficiaries</strong><span>Children, students, families</span></div>
                                <div><strong>Impact</strong><span>Better learning access</span></div>
                            </div>
                            <a href="{{ url('/donate') }}" class="program-btn">Support This Cause <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</section>
<!-- PROGRAM DETAILS END -->


<!-- MORE PROGRAMS START -->
<section class="section-padding more-programs-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge more-programs-badge">
                <i class="bi bi-plus-circle"></i>
                {{ $ourWork?->initiatives_badge ?? 'More Initiatives' }}
            </span>

            <h2 class="section-title">{{ $ourWork?->initiatives_title ?? 'Additional Community Programs' }}</h2>
        </div>

        <div class="row g-4">
            @forelse($initiatives as $initiative)
                <div class="col-md-6 col-lg-3">
                    <div class="mini-program-card">
                        <i class="{{ $initiative->icon ?? 'bi bi-cash-coin' }}"></i>
                        <h4>{{ $initiative->title }}</h4>
                        <p>{{ $initiative->description }}</p>
                    </div>
                </div>
            @empty
                @foreach([
                    ['bi bi-cash-coin', 'Poverty Alleviation', 'Support initiatives for families and communities in need.'],
                    ['bi bi-droplet-fill', 'Blood Donation Camps', 'Community donation drives to support emergency healthcare needs.'],
                    ['bi bi-megaphone-fill', 'Awareness Rallies', 'Public awareness programs for health, education, and welfare.'],
                    ['bi bi-houses-fill', 'Community Development', 'Local development efforts for stronger and healthier communities.'],
                ] as $fallback)
                    <div class="col-md-6 col-lg-3">
                        <div class="mini-program-card">
                            <i class="{{ $fallback[0] }}"></i>
                            <h4>{{ $fallback[1] }}</h4>
                            <p>{{ $fallback[2] }}</p>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
<!-- MORE PROGRAMS END -->


<!-- PROGRAM CTA START -->
<section class="program-cta-section">
    <div class="container">
        <div class="program-cta-box">
            <div>
                <span>{{ $ourWork?->cta_badge ?? 'Support Our Work' }}</span>
                <h2>{{ $ourWork?->cta_title ?? "Be a Part of URMILA Foundation's Social Impact Journey" }}</h2>
                <p>
                    {{ $ourWork?->cta_description ?? 'You can support our programs through donations, volunteering, partnerships, and community participation.' }}
                </p>
            </div>

            <div class="program-cta-actions">
                <a href="{{ $ourWork?->cta_primary_button_link ?? url('/donate') }}" class="btn btn-light-custom">
                    {{ $ourWork?->cta_primary_button_text ?? 'Donate Now' }}
                </a>

                <a href="{{ $ourWork?->cta_secondary_button_link ?? url('/volunteer') }}" class="btn btn-outline-light-custom">
                    {{ $ourWork?->cta_secondary_button_text ?? 'Become Volunteer' }}
                </a>
            </div>
        </div>
    </div>
</section>
<!-- PROGRAM CTA END -->

@endsection
