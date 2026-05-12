@extends('frontend.master')

@section('content')

@php
    $about = $about ?? null;
    $programs = $programs ?? collect();
    $events = $events ?? collect();
    $galleryPhotos = $galleryPhotos ?? collect();
    $site = $websiteSetting ?? ($globalWebsiteSetting ?? null);
    $contactPage = $contactPage ?? null;
    $homeHero = $homeHero ?? null;
    $heroImage = $homeHero && $homeHero->image ? asset('uploads/home-hero/' . $homeHero->image) : asset('assets/img/img.jpeg');
    $heroPrimaryLink = $homeHero?->primary_button_link ?: route('frontend.donate');
    $heroSecondaryLink = $homeHero?->secondary_button_link ?: route('frontend.volunteer');
@endphp



    <!-- ================= HERO START ================= -->
    <section class="hero-section">
        <div class="container">

            <div class="row align-items-center g-5">

                <!-- Left Content -->
                <div class="col-lg-6">
                    <div class="hero-content">

                        <span class="section-badge hero-badge">
                            <i class="{{ $homeHero?->badge_icon ?? 'bi bi-stars' }}"></i>
                            {{ $homeHero?->badge_text ?? 'For Social Impact' }} 
                        </span>

                        <h1 class="hero-title">
                            {{ $homeHero?->title ?? 'Building Hope, Empowering Communities' }}
                        </h1>

                        <p class="hero-text">
                            {{ $homeHero?->description ?? 'URMILA Development Foundation works for education, healthcare, women empowerment, poverty alleviation, environmental awareness, and community welfare.' }}
                        </p>

                        <div class="hero-buttons">
                            <a href="{{ $heroPrimaryLink }}" class="btn btn-primary-custom">
                                <i class="bi bi-heart-fill me-2"></i>
                                {{ $homeHero?->primary_button_text ?? 'Donate Now' }}
                            </a>

                            <a href="{{ $heroSecondaryLink }}" class="btn btn-outline-custom">
                                <i class="bi bi-person-plus me-2"></i>
                                {{ $homeHero?->secondary_button_text ?? 'Become Volunteer' }}
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Right Image -->
                <div class="col-lg-6">
                    <div class="hero-image-wrap">

                        <div class="hero-image-box">
                            <img src="{{ $heroImage }}" alt="{{ $homeHero?->image_alt ?? 'URMILA Development Foundation' }}">
                        </div>

                        <div class="hero-small-card">
                            <div class="hero-small-icon">
                                <i class="{{ $homeHero?->small_card_icon ?? 'bi bi-heart-pulse-fill' }}"></i>
                            </div>

                            <div>
                                <h6>{{ $homeHero?->small_card_title ?? 'Community Welfare' }}</h6>
                                <p>{{ $homeHero?->small_card_text ?? 'Serving people with care' }}</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ================= HERO END ================= -->


    <!-- ================= ABOUT START ================= -->
    <section class="section-padding about-section">
        <div class="container">

            <div class="row align-items-center g-5 about-row">

                <!-- Left Image -->
                <div class="col-lg-6">
                    <div class="about-image-wrap">
                        <img src="{{ $about && $about->intro_image ? asset('uploads/about/' . $about->intro_image) : asset('assets/img/gallery/gallery (11).jpeg') }}" alt="{{ $about?->intro_title ?? 'About URMILA Foundation' }}" class="about-img">

                        <div class="about-image-card">
                            <i class="bi bi-heart-fill"></i>
                            <div>
                                <h6>{{ $about?->intro_floating_title ?? 'Social Impact' }}</h6>
                                <p>{{ $about?->intro_floating_text ?? 'Serving communities with care' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-6">
                    <div class="about-content">

                        <span class="section-badge about-badge">
                            <i class="bi bi-info-circle"></i>
                            {{ $about?->intro_badge ?? 'About Us' }}
                        </span>

                        <h2 class="section-title about-title">
                            {{ $about?->intro_title ?? 'URMILA Development Foundation' }}
                        </h2>

                        <p class="about-text">
                            {{ $about?->intro_description_one ?? 'We are a social welfare organization dedicated to creating meaningful change through community development programs and social initiatives.' }}
                        </p>

                        <p class="about-text">
                            {{ $about?->intro_description_two ?? 'Our mission is to support people through education, healthcare, awareness programs, skill development, and welfare activities.' }}
                        </p>

                        <div class="about-points">
                            <div class="about-point">
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $about?->intro_point_one ?? 'Education & healthcare support' }}
                            </div>

                            <div class="about-point">
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $about?->intro_point_two ?? 'Women empowerment programs' }}
                            </div>

                            <div class="about-point">
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $about?->intro_point_three ?? 'Community welfare activities' }}
                            </div>
                        </div>

                        <a href="{{ route('frontend.about') }}" class="btn btn-primary-custom about-btn">
                            Learn More
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ================= ABOUT END ================= -->


    <!-- ================= PROGRAMS START ================= -->
    <section class="section-padding programs-section">
        <div class="container">

            <div class="text-center mb-5">
                <span class="section-badge programs-badge">
                    <i class="bi bi-grid"></i> Our Work
                </span>

                <h2 class="section-title">Key Areas of Impact</h2>

                <p class="section-text mx-auto">
                    We work across important social development areas to create a better and more inclusive society.
                </p>
            </div>

            <div class="row g-4">
                @forelse($programs as $program)
                    <div class="col-md-6 col-lg-4">
                        <div class="program-card">
                            <div class="program-icon">
                                <i class="{{ $program->icon ?? 'bi bi-grid' }}"></i>
                            </div>

                            <h4>{{ $program->title }}</h4>
                            <p>{{ $program->description }}</p>

                            <a href="{{ route('frontend.our-work') }}">
                                {{ $program->button_text ?? 'Read More' }} <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    @foreach([
                        ['bi bi-book', 'Education Support', 'Supporting children and communities through education awareness, learning material, and academic support.'],
                        ['bi bi-hospital', 'Healthcare Camps', 'Organizing medical camps, health awareness programs, and welfare initiatives for underserved communities.'],
                        ['bi bi-people', 'Women Empowerment', 'Encouraging women through skill development, awareness, training, and community support programs.'],
                    ] as [$icon, $title, $text])
                        <div class="col-md-6 col-lg-4">
                            <div class="program-card">
                                <div class="program-icon"><i class="{{ $icon }}"></i></div>
                                <h4>{{ $title }}</h4>
                                <p>{{ $text }}</p>
                                <a href="{{ route('frontend.our-work') }}">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endforelse
            </div>

        </div>
    </section>
    <!-- ================= PROGRAMS END ================= -->


    <!-- ================= IMPACT START ================= -->
    <section class="impact-section">
        <div class="container">

            <div class="impact-head text-center">
                <span class="section-badge impact-badge">
                    <i class="bi bi-graph-up-arrow"></i>
                    Our Impact
                </span>

                <h2 class="impact-title">
                    Creating Measurable Social Change
                </h2>

                <p class="impact-text">
                    Every initiative helps us reach more people, support more families,
                    and build stronger communities.
                </p>
            </div>

            <div class="row g-4 text-center">

                <div class="col-6 col-lg-3">
                    <div class="impact-box">
                        <div class="impact-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <h3>{{ $about?->stat_one_number ?? '500+' }}</h3>
                        <p>{{ $about?->stat_one_title ?? 'Beneficiaries' }}</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="impact-box">
                        <div class="impact-icon">
                            <i class="bi bi-grid-1x2-fill"></i>
                        </div>

                        <h3>{{ $about?->stat_two_number ?? '50+' }}</h3>
                        <p>{{ $about?->stat_two_title ?? 'Programs' }}</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="impact-box">
                        <div class="impact-icon">
                            <i class="bi bi-person-heart"></i>
                        </div>

                        <h3>{{ $about?->stat_three_number ?? '100+' }}</h3>
                        <p>{{ $about?->stat_three_title ?? 'Volunteers' }}</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="impact-box">
                        <div class="impact-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>

                        <h3>{{ $events->count() ?: '20+' }}</h3>
                        <p>Campaigns</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ================= IMPACT END ================= -->


    <!-- ================= EVENTS START ================= -->
    <section class="section-padding events-section">
        <div class="container">

            <div class="events-head d-flex flex-wrap justify-content-between align-items-center mb-5">
                <div>
                    <span class="section-badge events-badge">
                        <i class="bi bi-calendar-event"></i>
                        Campaigns & Events
                    </span>

                    <h2 class="section-title mb-0">Recent Activities</h2>
                </div>

                <a href="{{ route('frontend.campaigns') }}" class="btn btn-outline-custom mt-3 mt-md-0">
                    View All Events
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="event-card">
                            <div class="event-img">
                                <img src="{{ $event->image ? asset('uploads/campaigns/' . $event->image) : asset('assets/img/gallery/gallery (12).jpeg') }}" alt="{{ $event->title }}">
                                <span class="event-category">{{ $event->category ?? $event->status_label ?? 'Campaign' }}</span>
                            </div>

                            <div class="event-content">
                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $event->event_date ?? optional($event->created_at)->format('d M Y') }}
                                </span>

                                <h4>{{ $event->title }}</h4>
                                <p>{{ $event->description }}</p>

                                <a href="{{ route('frontend.campaigns.show', $event) }}">
                                    {{ $event->primary_button_text ?? 'View Details' }}
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="section-text text-center mx-auto">No campaign events found.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
    <!-- ================= EVENTS END ================= -->


    <!-- ================= CTA START ================= -->
    <section class="cta-section">
        <div class="container">

            <div class="cta-box">

                <div class="cta-pattern"></div>

                <div class="row align-items-center g-4">

                    <div class="col-lg-8">
                        <div class="cta-content">

                            <span class="cta-badge">
                                <i class="bi bi-heart-fill"></i>
                                Support Our Mission
                            </span>

                            <h2>Join Hands to Create Social Change</h2>

                            <p>
                                Your support can help us reach more people through education,
                                healthcare, food support, and community welfare programs.
                            </p>

                            <div class="cta-highlights">
                                <span>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Trusted NGO Work
                                </span>

                                <span>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Community Welfare
                                </span>

                                <span>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Real Social Impact
                                </span>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="cta-actions">
                            <a href="{{ $site?->donate_button_link ?? route('frontend.donate') }}" class="btn btn-light-custom">
                                <i class="bi bi-heart-fill me-2"></i>
                                Donate
                            </a>

                            <a href="{{ $site?->volunteer_button_link ?? route('frontend.volunteer') }}" class="btn btn-outline-light-custom">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Volunteer
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- ================= CTA END ================= -->


    <!-- ================= GALLERY START ================= -->
    <section class="section-padding gallery-section">
        <div class="container">

            <div class="gallery-head text-center mb-5">
                <span class="section-badge gallery-badge">
                    <i class="bi bi-images"></i>
                    Gallery
                </span>

                <h2 class="section-title">Photo Highlights</h2>

                <p class="section-text mx-auto">
                    A glimpse of our activities, campaigns, community programs, and social impact moments.
                </p>
            </div>

            <div class="row g-4">
                @forelse($galleryPhotos as $photo)
                    <div class="col-md-4">
                        <div class="gallery-card">
                            <img src="{{ $photo->image ? asset('uploads/gallery/' . $photo->image) : asset('assets/img/gallery/gallery.jpeg') }}" alt="{{ $photo->title ?? 'Gallery Image' }}">

                            <div class="gallery-overlay">
                                <span>{{ $photo->title ?? $photo->category ?? 'Gallery Image' }}</span>

                                <a href="{{ route('frontend.gallery') }}" aria-label="View Gallery">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    @foreach([
                        ['assets/img/gallery/gallery.jpeg', 'Community Work'],
                        ['assets/img/gallery/gallery (10).jpeg', 'Health Camp'],
                        ['assets/img/gallery/gallery (7).jpeg', 'Awareness Drive'],
                    ] as [$image, $title])
                        <div class="col-md-4">
                            <div class="gallery-card">
                                <img src="{{ asset($image) }}" alt="{{ $title }}">
                                <div class="gallery-overlay">
                                    <span>{{ $title }}</span>
                                    <a href="{{ route('frontend.gallery') }}" aria-label="View Gallery"><i class="bi bi-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('frontend.gallery') }}" class="btn btn-primary-custom">
                    View Full Gallery
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

        </div>
    </section>
    <!-- ================= GALLERY END ================= -->


    <!-- ================= CONTACT SHORTCUT START ================= -->
    <section class="section-padding contact-shortcut">
        <div class="container">

            <div class="contact-shortcut-head text-center mb-5">
                <span class="section-badge contact-badge">
                    <i class="bi bi-headset"></i>
                    Get In Touch
                </span>

                <h2 class="section-title">
                    Contact URMILA Foundation
                </h2>

                <p class="section-text mx-auto">
                    Reach out to us for donations, volunteering, partnerships, campaigns,
                    and community welfare support.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <h5>Address</h5>

                        <p>{{ $site?->address ?? 'Lalita Bhawan, Boring Rd, Gandhi Nagar, Sri Krishna Puri, Patna, Bihar 800013' }}</p>

                        <a href="{{ route('frontend.contact') }}">
                            View Location
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <h5>Phone</h5>

                        <p>{{ $site?->phone ?? '+91 79 7976 0133' }}</p>

                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site?->phone ?? '+917979760133') }}">
                            Call Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <h5>Email</h5>

                        <p>{{ $site?->email ?? 'info@domainname.com' }}</p>

                        <a href="mailto:{{ $site?->email ?? 'info@domainname.com' }}">
                            Send Email
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ================= CONTACT SHORTCUT END ================= -->

@endsection




