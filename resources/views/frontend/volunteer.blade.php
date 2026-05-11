@extends('frontend.master')

@section('content')


    <!-- VOLUNTEER HERO START -->
    <section class="volunteer-hero">
        <div class="container">

            <div class="volunteer-hero-box text-center">

                <span class="section-badge volunteer-hero-badge">
                    <i class="bi bi-person-heart"></i>
                    Join Us
                </span>

                <h1>Become a Volunteer</h1>

                <p>
                    Join URMILA Development Foundation and support social welfare,
                    education, healthcare, awareness campaigns, events and community development work.
                </p>

                <div class="volunteer-hero-actions">
                    <a href="#volunteer-form" class="btn btn-primary-custom">
                        Join Now
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="{{ route('frontend.contact') }}" class="btn btn-outline-custom">
                        Contact Team
                    </a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Volunteer
                        </li>
                    </ol>
                </nav>

            </div>

        </div>
    </section>
    <!-- VOLUNTEER HERO END -->


    <!-- VOLUNTEER CATEGORIES START -->
    <section class="section-padding volunteer-category-section">
        <div class="container">

            <div class="text-center mb-5">
                <span class="section-badge volunteer-badge">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Volunteer Areas
                </span>

                <h2 class="section-title">
                    Choose How You Want to Support
                </h2>

                <p class="section-text mx-auto">
                    You can contribute your time and skills in different areas based on your interest.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <div class="volunteer-category-card">
                        <div class="volunteer-icon">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>

                        <h4>Event Volunteer</h4>
                        <p>Support campaign planning, event coordination, and public activities.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="volunteer-category-card">
                        <div class="volunteer-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>

                        <h4>Teaching Support</h4>
                        <p>Help children and communities with learning support and education awareness.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="volunteer-category-card">
                        <div class="volunteer-icon">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>

                        <h4>Medical Camp Support</h4>
                        <p>Assist in health camps, registration, awareness and community support.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="volunteer-category-card">
                        <div class="volunteer-icon">
                            <i class="bi bi-share-fill"></i>
                        </div>

                        <h4>Social Media Support</h4>
                        <p>Help share updates, campaign stories, awareness posts and activity reports.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="volunteer-category-card">
                        <div class="volunteer-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <h4>Field Work Volunteer</h4>
                        <p>Support ground-level activities, surveys, community visits and awareness drives.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="volunteer-category-card">
                        <div class="volunteer-icon">
                            <i class="bi bi-cash-heart"></i>
                        </div>

                        <h4>Fundraising Support</h4>
                        <p>Help raise support for social programs, campaigns and welfare activities.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- VOLUNTEER CATEGORIES END -->


    <!-- VOLUNTEER FORM START -->
    <section class="section-padding volunteer-form-section" id="volunteer-form">
        <div class="container">

            <div class="row g-4 align-items-stretch">

                <div class="col-lg-7">
                    <div class="volunteer-form-card">

                        <span class="section-badge volunteer-form-badge">
                            <i class="bi bi-pencil-square"></i>
                            Volunteer Form
                        </span>

                        <h2>Join as a Volunteer</h2>

                        <p>
                            Fill the form below and our team will contact you for upcoming
                            events, campaigns and social welfare activities.
                        </p>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="volunteer-page-form" method="POST" action="{{ route('frontend.volunteer.store') }}">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" placeholder="Enter full name" required>
                                    @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Mobile Number</label>
                                    <input type="tel" name="mobile_number" value="{{ old('mobile_number') }}" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="+91 00000 00000">
                                    @error('mobile_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address">
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label>City / Location</label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" placeholder="Enter city or location">
                                    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Area of Interest</label>
                                    <select name="area_of_interest" class="form-select @error('area_of_interest') is-invalid @enderror">
                                        <option value="">Select interest</option>
                                        @foreach(['Event Volunteer', 'Teaching Support', 'Medical Camp Support', 'Social Media Support', 'Field Work Volunteer', 'Fundraising Support'] as $interest)
                                            <option value="{{ $interest }}" {{ old('area_of_interest') === $interest ? 'selected' : '' }}>{{ $interest }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_of_interest')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Availability</label>
                                    <select name="availability" class="form-select @error('availability') is-invalid @enderror">
                                        <option value="">Select availability</option>
                                        @foreach(['Weekdays', 'Weekends', 'Part Time', 'Full Time', 'As Required'] as $availability)
                                            <option value="{{ $availability }}" {{ old('availability') === $availability ? 'selected' : '' }}>{{ $availability }}</option>
                                        @endforeach
                                    </select>
                                    @error('availability')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-12">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4"
                                        placeholder="Tell us how you want to contribute">{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom volunteer-submit-btn">
                                        Submit Application
                                        <i class="bi bi-send-fill ms-2"></i>
                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="volunteer-side-card">

                        <span class="section-badge volunteer-side-badge">
                            <i class="bi bi-stars"></i>
                            Why Join Us
                        </span>

                        <h2>Be a Part of Meaningful Change</h2>

                        <p>
                            Your time, skills and support can help us reach more communities
                            through education, healthcare, food support, awareness and social welfare programs.
                        </p>

                        <div class="volunteer-benefit-list">

                            <div>
                                <i class="bi bi-check-circle-fill"></i>
                                Support real community development activities.
                            </div>

                            <div>
                                <i class="bi bi-check-circle-fill"></i>
                                Work with social campaigns and public welfare programs.
                            </div>

                            <div>
                                <i class="bi bi-check-circle-fill"></i>
                                Build experience in NGO and field-level social work.
                            </div>

                        </div>

                        <div class="volunteer-contact-box">
                            <h5>Need Help?</h5>

                            <a href="tel:+917979760133">
                                <i class="bi bi-telephone"></i>
                                +91 79 7976 0133
                            </a>

                            <a href="mailto:info@domainname.com">
                                <i class="bi bi-envelope"></i>
                                info@domainname.com
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- VOLUNTEER FORM END -->


    <!-- VOLUNTEER CTA START -->
    <section class="volunteer-cta-section">
        <div class="container">

            <div class="volunteer-cta-box">
                <div>
                    <span>Join Our Mission</span>
                    <h2>Give Your Time for a Better Society</h2>
                    <p>
                        Become a volunteer and help us create positive social impact.
                    </p>
                </div>

                <div class="volunteer-cta-actions">
                    <a href="#volunteer-form" class="btn btn-light-custom">
                        Apply Now
                    </a>

                    <a href="{{ route('frontend.donate') }}" class="btn btn-outline-light-custom">
                        Donate Instead
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- VOLUNTEER CTA END -->


@endsection
