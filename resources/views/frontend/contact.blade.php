@extends('frontend.master')

@section('content')

@php
    $contactPage = $contactPage ?? null;
    $site = $websiteSetting ?? ($globalWebsiteSetting ?? null);
    $phone = $site?->phone ?? '+91 79 7976 0133';
    $phoneLink = 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
    $email = $site?->email ?? 'info@domainname.com';
    $address = $site?->address ?? 'Lalita Bhawan, Boring Rd, Gandhi Nagar, Sri Krishna Puri, Patna, Bihar 800013';
    $officeTime = $site?->office_time ?? 'Mon - Sat 10:00 AM - 6:00 PM';
    $mapLink = $site?->map_link ?? 'https://www.google.com/maps';
    $mapEmbed = $site?->map_embed_url ?? 'https://www.google.com/maps?q=Lalita%20Bhawan%2C%20Boring%20Rd%2C%20Gandhi%20Nagar%2C%20Sri%20Krishna%20Puri%2C%20Patna%2C%20Bihar%20800013&output=embed';
    $heroCards = [
        [$contactPage?->hero_card_one_icon ?? 'bi bi-telephone-fill', $contactPage?->hero_card_one_title ?? 'Call Us', $phoneLink],
        [$contactPage?->hero_card_two_icon ?? 'bi bi-envelope-fill', $contactPage?->hero_card_two_title ?? 'Email Us', 'mailto:' . $email],
        [$contactPage?->hero_card_three_icon ?? 'bi bi-geo-alt-fill', $contactPage?->hero_card_three_title ?? 'Find Us', '#map-section'],
        [$contactPage?->hero_card_four_icon ?? 'bi bi-send-fill', $contactPage?->hero_card_four_title ?? 'Message', '#contact-form'],
    ];
@endphp

<section class="contact-page-hero">
    <span class="contact-hero-shape contact-shape-one"></span>
    <span class="contact-hero-shape contact-shape-two"></span>

    <div class="container">
        <div class="contact-hero-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="contact-hero-content">
                        <span class="section-badge contact-hero-badge">
                            <i class="bi bi-headset"></i>
                            {{ $contactPage?->hero_badge ?? 'Contact Us' }}
                        </span>

                        <h1>{{ $contactPage?->hero_title ?? 'Let’s Connect for Social Change' }}</h1>
                        <p>{{ $contactPage?->hero_description ?? 'Reach out to URMILA Development Foundation for donations, volunteering, partnerships, campaigns, community welfare support, or general enquiries.' }}</p>

                        <div class="contact-hero-actions">
                            <a href="#contact-form" class="btn btn-primary-custom">
                                {{ $contactPage?->hero_primary_button_text ?? 'Send Message' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <a href="{{ $phoneLink }}" class="btn btn-outline-custom">
                                {{ $contactPage?->hero_secondary_button_text ?? 'Call Now' }}
                            </a>
                        </div>

                        <nav aria-label="breadcrumb" class="contact-breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-hero-side">
                        <div class="contact-feature-note">
                            <div class="contact-feature-icon">
                                <i class="{{ $contactPage?->hero_feature_icon ?? 'bi bi-chat-dots-fill' }}"></i>
                            </div>
                            <div>
                                <h4>{{ $contactPage?->hero_feature_title ?? 'We’re Here to Help' }}</h4>
                                <p>{{ $contactPage?->hero_feature_text ?? 'Connect with us for donation, volunteer, and campaign support.' }}</p>
                            </div>
                        </div>

                        <div class="contact-topic-grid">
                            @foreach($heroCards as [$icon, $title, $link])
                                <a href="{{ $link }}" class="contact-topic-card">
                                    <i class="{{ $icon }}"></i>
                                    <h5>{{ $title }}</h5>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding contact-info-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge contact-info-badge">
                <i class="bi bi-info-circle-fill"></i>
                {{ $contactPage?->info_badge ?? 'Contact Details' }}
            </span>
            <h2 class="section-title">{{ $contactPage?->info_title ?? 'Reach URMILA Development Foundation' }}</h2>
            <p class="section-text mx-auto">{{ $contactPage?->info_description ?? 'Use the details below to connect with our team for support, partnerships, and social welfare activities.' }}</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="contact-detail-card">
                    <div class="contact-detail-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <h4>Address</h4>
                    <p>{{ $address }}</p>
                    <a href="#map-section">View Map <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="contact-detail-card">
                    <div class="contact-detail-icon"><i class="bi bi-telephone-fill"></i></div>
                    <h4>Phone</h4>
                    <p>{{ $phone }}</p>
                    <a href="{{ $phoneLink }}">Call Now <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="contact-detail-card">
                    <div class="contact-detail-icon"><i class="bi bi-envelope-fill"></i></div>
                    <h4>Email</h4>
                    <p>{{ $email }}</p>
                    <a href="mailto:{{ $email }}">Send Email <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="contact-detail-card">
                    <div class="contact-detail-icon"><i class="bi bi-clock-fill"></i></div>
                    <h4>Office Time</h4>
                    <p>{{ $officeTime }}</p>
                    <a href="#contact-form">Enquire Now <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding contact-form-section" id="contact-form">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="contact-form-card">
                    <span class="section-badge contact-form-badge">
                        <i class="bi bi-pencil-square"></i>
                        {{ $contactPage?->form_badge ?? 'Send Message' }}
                    </span>
                    <h2>{{ $contactPage?->form_title ?? 'Write to Us' }}</h2>
                    <p class="contact-form-text">{{ $contactPage?->form_description ?? 'Fill out the form below and our team will connect with you regarding your enquiry.' }}</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form class="contact-page-form" method="POST" action="{{ route('frontend.contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your name" required>
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label>Phone</label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+91 00000 00000">
                            </div>
                            <div class="col-md-6">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Enter subject">
                            </div>
                            <div class="col-12">
                                <label>Message</label>
                                <textarea name="message" class="form-control" rows="5" placeholder="Write your message here">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-custom contact-submit-btn">
                                    Send Message
                                    <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="contact-support-card">
                    <span class="section-badge contact-support-badge">
                        <i class="bi bi-people-fill"></i>
                        {{ $contactPage?->support_badge ?? 'Support Desk' }}
                    </span>
                    <h2>{{ $contactPage?->support_title ?? 'Contact Support' }}</h2>
                    <p>{{ $contactPage?->support_description ?? 'For donation, volunteer registration, partnership or event-related enquiries, contact our support team.' }}</p>

                    <div class="support-person-box">
                        <div class="support-avatar"><i class="bi bi-person-check-fill"></i></div>
                        <div>
                            <h5>{{ $contactPage?->support_person_title ?? 'Donation & Volunteer Support' }}</h5>
                            <span>{{ $contactPage?->support_person_subtitle ?? ($site?->site_name ?? 'URMILA Development Foundation') }}</span>
                        </div>
                    </div>

                    <div class="support-contact-list">
                        <a href="{{ $phoneLink }}"><i class="bi bi-telephone"></i><span>{{ $phone }}</span></a>
                        <a href="mailto:{{ $email }}"><i class="bi bi-envelope"></i><span>{{ $email }}</span></a>
                        <a href="#map-section"><i class="bi bi-geo-alt"></i><span>{{ $site?->city ?? 'Patna' }}, {{ $site?->state ?? 'Bihar' }}</span></a>
                    </div>

                    <div class="contact-social-box">
                        <h5>Follow Us</h5>
                        <div class="contact-social-links">
                            <a href="{{ $site?->facebook_link ?? '#' }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $site?->instagram_link ?? '#' }}" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $site?->youtube_link ?? '#' }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                            <a href="{{ $site?->twitter_link ?? '#' }}" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding map-section" id="map-section">
    <div class="container">
        <div class="map-premium-box">
            <div class="map-content">
                <span class="section-badge map-badge">
                    <i class="bi bi-map-fill"></i>
                    {{ $contactPage?->map_badge ?? 'Find Us' }}
                </span>
                <h2>{{ $contactPage?->map_title ?? 'Visit Our Office' }}</h2>
                <p>{{ $contactPage?->map_description ?? $address }}</p>
                <a href="{{ $mapLink }}" target="_blank" class="btn btn-primary-custom">
                    {{ $contactPage?->map_button_text ?? 'Open Google Map' }}
                    <i class="bi bi-arrow-up-right ms-2"></i>
                </a>
            </div>
            <div class="map-frame">
                <iframe src="{{ $mapEmbed }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<section class="contact-cta-section">
    <div class="container">
        <div class="contact-cta-box">
            <div>
                <span>{{ $contactPage?->cta_badge ?? 'Let’s Work Together' }}</span>
                <h2>{{ $contactPage?->cta_title ?? 'Join Hands With Us for Community Welfare' }}</h2>
                <p>{{ $contactPage?->cta_description ?? 'Become a donor, volunteer, partner, or supporter of URMILA Development Foundation.' }}</p>
            </div>
            <div class="contact-cta-actions">
                <a href="{{ $contactPage?->cta_primary_button_link ?? ($site?->donate_button_link ?? route('frontend.donate')) }}" class="btn btn-light-custom">
                    {{ $contactPage?->cta_primary_button_text ?? ($site?->donate_button_text ?? 'Donate Now') }}
                </a>
                <a href="{{ $contactPage?->cta_secondary_button_link ?? ($site?->volunteer_button_link ?? route('frontend.volunteer')) }}" class="btn btn-outline-light-custom">
                    {{ $contactPage?->cta_secondary_button_text ?? ($site?->volunteer_button_text ?? 'Become Volunteer') }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
