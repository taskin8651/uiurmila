@extends('frontend.master')

@section('content')

@php
    $testimonials = $testimonials ?? collect();
@endphp

<!-- TESTIMONIAL HERO START -->
<section class="testimonial-hero">
    <div class="container">
        <div class="testimonial-hero-box text-center">
            <span class="section-badge testimonial-hero-badge">
                <i class="bi bi-chat-heart-fill"></i>
                Impact Stories
            </span>

            <h1>Stories of Hope & Change</h1>

            <p>
                Voices from beneficiaries, volunteers, donors and community members
                who have experienced or supported our social welfare work.
            </p>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('frontend.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Impact Stories
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- TESTIMONIAL HERO END -->

<!-- TESTIMONIALS START -->
<section class="section-padding testimonial-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge testimonial-badge">
                <i class="bi bi-stars"></i>
                Testimonials
            </span>

            <h2 class="section-title">What People Say About Our Work</h2>

            <p class="section-text mx-auto">
                Real words from people connected with our campaigns, programs and community initiatives.
            </p>
        </div>

        <div class="row g-4">
            @forelse($testimonials as $testimonial)
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-quote">
                            <i class="bi bi-quote"></i>
                        </div>

                        <p>{{ $testimonial->message }}</p>

                        <div class="testimonial-user">
                            <div class="testimonial-avatar">
                                <i class="{{ $testimonial->icon ?: 'bi bi-person-fill' }}"></i>
                            </div>

                            <div>
                                <h5>{{ $testimonial->name }}</h5>
                                <span>{{ $testimonial->designation ?: 'Community Supporter' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @foreach([
                    ['bi bi-person-fill', 'Community Member', 'Health Camp Beneficiary', 'URMILA Development Foundation health camp helped our community get basic checkups and useful health guidance.'],
                    ['bi bi-person-heart', 'Volunteer', 'Education Support', 'Volunteering with the foundation gave me a chance to contribute directly to education and awareness activities.'],
                    ['bi bi-people-fill', 'Local Supporter', 'Community Welfare', 'Their food distribution and welfare support created meaningful relief for many families in need.'],
                ] as [$icon, $name, $designation, $message])
                    <div class="col-md-6 col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-quote">
                                <i class="bi bi-quote"></i>
                            </div>

                            <p>{{ $message }}</p>

                            <div class="testimonial-user">
                                <div class="testimonial-avatar">
                                    <i class="{{ $icon }}"></i>
                                </div>

                                <div>
                                    <h5>{{ $name }}</h5>
                                    <span>{{ $designation }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
<!-- TESTIMONIALS END -->

<!-- IMPACT STORY START -->
<section class="section-padding impact-story-section">
    <div class="container">
        <div class="impact-story-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="impact-story-img">
                        <img src="{{ asset('assets/img/gallery/gallery (14).jpeg') }}" alt="Impact Story">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="impact-story-content">
                        <span class="section-badge impact-story-badge">
                            <i class="bi bi-heart-fill"></i>
                            Featured Impact
                        </span>

                        <h2>Small Support, Big Difference</h2>

                        <p>
                            Through education support, health camps, food distribution,
                            awareness drives and volunteer participation, the foundation aims
                            to create positive change at the community level.
                        </p>

                        <div class="impact-story-points">
                            <span>
                                <i class="bi bi-check-circle-fill"></i>
                                Community support
                            </span>
                            <span>
                                <i class="bi bi-check-circle-fill"></i>
                                Volunteer participation
                            </span>
                            <span>
                                <i class="bi bi-check-circle-fill"></i>
                                Social welfare activities
                            </span>
                        </div>

                        <a href="{{ route('frontend.donate') }}" class="btn btn-primary-custom mt-3">
                            Support Our Work
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- IMPACT STORY END -->

<!-- TESTIMONIAL CTA START -->
<section class="testimonial-cta-section">
    <div class="container">
        <div class="testimonial-cta-box">
            <div>
                <span>Be Part of the Change</span>
                <h2>Your Support Can Create More Impact Stories</h2>
                <p>Join as a donor, volunteer or community supporter and help us serve more people.</p>
            </div>

            <div class="testimonial-cta-actions">
                <a href="{{ route('frontend.volunteer') }}" class="btn btn-light-custom">
                    Become Volunteer
                </a>

                <a href="{{ route('frontend.donate') }}" class="btn btn-outline-light-custom">
                    Donate Now
                </a>
            </div>
        </div>
    </div>
</section>
<!-- TESTIMONIAL CTA END -->

@endsection
