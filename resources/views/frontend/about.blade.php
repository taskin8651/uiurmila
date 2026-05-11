@extends('frontend.master')

@section('content')

@php
    $about = $about ?? null;
@endphp

<!-- ABOUT PAGE HERO START -->
<section class="inner-hero about-page-hero">

    <span class="inner-shape inner-shape-1"></span>
    <span class="inner-shape inner-shape-2"></span>

    <div class="container">
        <div class="inner-hero-box text-center">

            <span class="section-badge inner-badge">
                <i class="bi bi-info-circle"></i>
                {{ $about->hero_badge ?? 'About URMILA Foundation' }}
            </span>

            <h1>{{ $about->hero_title ?? 'About Us' }}</h1>

            <p>
                {{ $about->hero_description ?? 'Learn about our journey, mission, values, objectives, and commitment towards community development and social welfare.' }}
            </p>

            <div class="inner-hero-tags">
                <span>
                    <i class="bi bi-heart-fill"></i>
                    {{ $about->hero_tag_one ?? 'Social Welfare' }}
                </span>

                <span>
                    <i class="bi bi-people-fill"></i>
                    {{ $about->hero_tag_two ?? 'Community Development' }}
                </span>

                <span>
                    <i class="bi bi-stars"></i>
                    {{ $about->hero_tag_three ?? 'Positive Impact' }}
                </span>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $about->hero_title ?? 'About Us' }}
                    </li>
                </ol>
            </nav>

        </div>
    </div>
</section>
<!-- ABOUT PAGE HERO END -->


<!-- INTRODUCTION START -->
<section class="section-padding about-intro-section">
    <div class="container">

        <div class="row align-items-center g-5 about-intro-row">

            <div class="col-lg-6">
                <div class="about-page-image-wrap">
                    <img
                        src="{{ $about && $about->intro_image ? asset('uploads/about/' . $about->intro_image) : asset('assets/img/img.jpeg') }}"
                        alt="{{ $about->intro_title ?? 'URMILA Development Foundation' }}"
                        class="about-page-img"
                    >

                    <div class="about-page-floating-card">
                        <i class="bi bi-heart-fill"></i>
                        <div>
                            <h6>{{ $about->intro_floating_title ?? 'Social Welfare' }}</h6>
                            <p>{{ $about->intro_floating_text ?? 'Serving communities with compassion' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-page-content">

                    <span class="section-badge about-badge">
                        <i class="bi bi-stars"></i>
                        {{ $about->intro_badge ?? 'Who We Are' }}
                    </span>

                    <h2 class="section-title">
                        {{ $about->intro_title ?? 'URMILA Development Foundation' }}
                    </h2>

                    <p>
                        {{ $about->intro_description_one ?? 'URMILA Development Foundation is a social welfare organization working for community development and positive social impact.' }}
                    </p>

                    <p>
                        {{ $about->intro_description_two ?? 'Our purpose is to create a trusted platform where people, volunteers, donors, partners, and communities can come together to support meaningful change.' }}
                    </p>

                    <div class="about-intro-stats">
                        <div>
                            <strong>{{ $about->stat_one_number ?? '500+' }}</strong>
                            <span>{{ $about->stat_one_title ?? 'Beneficiaries' }}</span>
                        </div>

                        <div>
                            <strong>{{ $about->stat_two_number ?? '50+' }}</strong>
                            <span>{{ $about->stat_two_title ?? 'Programs' }}</span>
                        </div>

                        <div>
                            <strong>{{ $about->stat_three_number ?? '100+' }}</strong>
                            <span>{{ $about->stat_three_title ?? 'Volunteers' }}</span>
                        </div>
                    </div>

                    <div class="about-page-points">
                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->intro_point_one ?? 'Community Development' }}
                        </span>

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->intro_point_two ?? 'Education & Healthcare' }}
                        </span>

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->intro_point_three ?? 'Women Empowerment' }}
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
<!-- INTRODUCTION END -->


<!-- FOUNDATION STORY START -->
<section class="section-padding founder-story-section">
    <div class="container">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-5">
                <div class="story-title-card">
                    <span class="section-badge story-badge">
                        <i class="bi bi-book-half"></i>
                        {{ $about->story_badge ?? 'Our Story' }}
                    </span>

                    <h2>{{ $about->story_title ?? 'Why the Foundation Exists' }}</h2>

                    <p>
                        {{ $about->story_short_description ?? 'The foundation exists to support underserved communities and create opportunities for growth, dignity, health, education, and social awareness.' }}
                    </p>

                    <div class="story-mini-box">
                        <i class="bi bi-heart-fill"></i>
                        <div>
                            <strong>{{ $about->story_mini_title ?? 'Purpose Driven' }}</strong>
                            <span>{{ $about->story_mini_text ?? 'Helping people through meaningful social action.' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="story-content-card">

                    <div class="story-quote-icon">
                        <i class="bi bi-quote"></i>
                    </div>

                    <p>
                        {{ $about->story_description_one ?? 'URMILA Development Foundation was created with the vision of contributing to society through welfare-based initiatives.' }}
                    </p>

                    <p>
                        {{ $about->story_description_two ?? 'Through campaigns, events, volunteer programs, awareness drives, and community welfare activities, the foundation aims to bridge these gaps.' }}
                    </p>

                    <div class="story-list">
                        <div>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                            <span>{{ $about->story_point_one ?? 'Support people through practical social programs.' }}</span>
                        </div>

                        <div>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                            <span>{{ $about->story_point_two ?? 'Build awareness around important community issues.' }}</span>
                        </div>

                        <div>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                            <span>{{ $about->story_point_three ?? 'Encourage participation from donors, volunteers, and partners.' }}</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
<!-- FOUNDATION STORY END -->


<!-- MISSION VISION START -->
<section class="section-padding mission-vision-section">
    <div class="container">

        <div class="mission-head text-center mb-5">
            <span class="section-badge mission-badge">
                <i class="bi bi-bullseye"></i>
                {{ $about->mission_section_badge ?? 'Mission & Vision' }}
            </span>

            <h2 class="section-title">
                {{ $about->mission_section_title ?? 'Our Purpose and Direction' }}
            </h2>

            <p class="section-text mx-auto">
                {{ $about->mission_section_description ?? 'We work with a clear mission and long-term vision to create sustainable social impact.' }}
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="mission-card">
                    <span class="mission-tag">Mission</span>

                    <div class="mission-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h3>{{ $about->mission_title ?? 'Our Mission' }}</h3>

                    <p>
                        {{ $about->mission_description ?? 'To support communities through education, healthcare, awareness, women empowerment, skill development, environmental programs, and welfare initiatives.' }}
                    </p>

                    <div class="mission-points">
                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->mission_point_one ?? 'Community Support' }}
                        </span>

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->mission_point_two ?? 'Social Welfare' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mission-card vision-card">
                    <span class="mission-tag">Vision</span>

                    <div class="mission-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <h3>{{ $about->vision_title ?? 'Our Vision' }}</h3>

                    <p>
                        {{ $about->vision_description ?? 'To build an empowered, educated, healthy, and socially responsible society where every individual has access to dignity, opportunity, and care.' }}
                    </p>

                    <div class="mission-points">
                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->vision_point_one ?? 'Equal Opportunity' }}
                        </span>

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $about->vision_point_two ?? 'Better Future' }}
                        </span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- MISSION VISION END -->


<!-- CORE VALUES START -->
<section class="section-padding core-values-section">
    <div class="container">

        <div class="values-head text-center mb-5">
            <span class="section-badge values-badge">
                <i class="bi bi-gem"></i>
                {{ $about->values_badge ?? 'Core Values' }}
            </span>

            <h2 class="section-title">
                {{ $about->values_title ?? 'Values That Guide Us' }}
            </h2>

            <p class="section-text mx-auto">
                {{ $about->values_description ?? 'Our work is guided by compassion, trust, equality, and sustainable community development.' }}
            </p>
        </div>

        <div class="row g-4">

            @forelse($values as $value)
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="{{ $value->icon ?? 'bi bi-heart-fill' }}"></i>
                        </div>

                        <h4>{{ $value->title }}</h4>
                        <p>{{ $value->description }}</p>

                        <span class="value-count">{{ $value->number }}</span>
                    </div>
                </div>
            @empty
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h4>Compassion</h4>
                        <p>Serving people with empathy, care, and humanity.</p>
                        <span class="value-count">01</span>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</section>
<!-- CORE VALUES END -->


<!-- OBJECTIVES LEGAL START -->
<section class="section-padding objectives-section">
    <div class="container">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-7">
                <div class="objectives-card">

                    <span class="section-badge objectives-badge">
                        <i class="bi bi-list-check"></i>
                        {{ $about->objectives_badge ?? 'Our Objectives' }}
                    </span>

                    <h2>{{ $about->objectives_title ?? 'What We Aim To Achieve' }}</h2>

                    <p class="objectives-text">
                        {{ $about->objectives_description ?? 'Our objectives are focused on creating practical, measurable, and long-term impact for communities through social welfare initiatives.' }}
                    </p>

                    <div class="objective-list">
                        @forelse($objectives as $objective)
                            <div>
                                <i class="{{ $objective->icon ?? 'bi bi-check2-circle' }}"></i>
                                <span>{{ $objective->title }}</span>
                            </div>
                        @empty
                            <div>
                                <i class="bi bi-check2-circle"></i>
                                <span>Promote education and learning support for children and communities.</span>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="legal-card">

                    <span class="section-badge legal-badge">
                        <i class="bi bi-file-earmark-check"></i>
                        {{ $about->legal_badge ?? 'Legal Details' }}
                    </span>

                    <h2>{{ $about->legal_title ?? 'Registration Information' }}</h2>

                    <p class="legal-text">
                        {{ $about->legal_description ?? 'Official registration and legal details can be updated here once provided by the foundation.' }}
                    </p>

                    <ul>
                        <li>
                            <i class="bi bi-building-check"></i>
                            <div>
                                <strong>Organization Name</strong>
                                <span>{{ $about->legal_organization_name ?? 'URMILA Development Foundation' }}</span>
                            </div>
                        </li>

                        <li>
                            <i class="bi bi-file-text"></i>
                            <div>
                                <strong>Registration No</strong>
                                <span>{{ $about->legal_registration_no ?? 'To be updated' }}</span>
                            </div>
                        </li>

                        <li>
                            <i class="bi bi-receipt"></i>
                            <div>
                                <strong>PAN / 80G / 12A</strong>
                                <span>{{ $about->legal_pan_details ?? 'To be updated, if applicable' }}</span>
                            </div>
                        </li>

                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <strong>Registered Address</strong>
                                <span>{{ $about->legal_registered_address ?? 'To be updated' }}</span>
                            </div>
                        </li>
                    </ul>

                    <a href="{{ $about->legal_button_link ?? url('/contact') }}" class="legal-link">
                        {{ $about->legal_button_text ?? 'Contact for Details' }}
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>
            </div>

        </div>

    </div>
</section>
<!-- OBJECTIVES LEGAL END -->


<!-- FOUNDER MESSAGE START -->
<section class="section-padding founder-message-section">
    <div class="container">

        <div class="founder-message-box">

            <div class="row align-items-center g-4">

                <div class="col-lg-4">
                    <div class="founder-photo-wrap">
                        <div class="founder-photo">
                            <img
                                src="{{ $about && $about->founder_image ? asset('uploads/about/' . $about->founder_image) : asset('assets/img/img.jpeg') }}"
                                alt="{{ $about->founder_title ?? 'Founder Message' }}"
                            >
                        </div>

                        <div class="founder-photo-badge">
                            <i class="bi bi-heart-fill"></i>
                            <span>{{ $about->founder_photo_badge ?? 'Social Service' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="founder-content">

                        <div class="founder-quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>

                        <span class="section-badge founder-badge">
                            <i class="bi bi-chat-quote"></i>
                            {{ $about->founder_badge ?? 'Message from Founder' }}
                        </span>

                        <h2>{{ $about->founder_title ?? 'Serving Society With Purpose' }}</h2>

                        <p>
                            {{ $about->founder_message ?? 'Our foundation is committed to working for people and communities who need support, awareness, and opportunity.' }}
                        </p>

                        <div class="founder-name">
                            <div class="founder-sign-icon">
                                <i class="bi bi-person-check-fill"></i>
                            </div>

                            <div>
                                <h5>{{ $about->founder_designation ?? 'Founder / Chairman / Secretary' }}</h5>
                                <span>{{ $about->founder_organization ?? 'URMILA Development Foundation' }}</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- FOUNDER MESSAGE END -->


<!-- LONG TERM GOALS START -->
<section class="section-padding goals-section">
    <div class="container">

        <div class="goals-head text-center mb-5">
            <span class="section-badge goals-badge">
                <i class="bi bi-flag-fill"></i>
                {{ $about->goals_badge ?? 'Long-Term Goals' }}
            </span>

            <h2 class="section-title">
                {{ $about->goals_title ?? 'Our Roadmap for Social Impact' }}
            </h2>

            <p class="section-text mx-auto">
                {{ $about->goals_description ?? 'We aim to expand our programs, reach more communities, and build stronger partnerships for long-term development.' }}
            </p>
        </div>

        <div class="row g-4">

            @forelse($goals as $goal)
                <div class="col-md-6 col-lg-4">
                    <div class="goal-card">
                        <div class="goal-number">{{ $goal->number }}</div>

                        <div class="goal-icon">
                            <i class="{{ $goal->icon ?? 'bi bi-people-fill' }}"></i>
                        </div>

                        <h4>{{ $goal->title }}</h4>

                        <p>{{ $goal->description }}</p>

                        @if($goal->button_text)
                            <a href="{{ $goal->button_link ?? '#' }}">
                                {{ $goal->button_text }}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-md-6 col-lg-4">
                    <div class="goal-card">
                        <div class="goal-number">01</div>
                        <div class="goal-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Expand Community Programs</h4>
                        <p>Reach more beneficiaries through regular welfare and awareness programs.</p>
                        <a href="{{ url('/programs') }}">
                            Explore Work
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</section>
<!-- LONG TERM GOALS END -->

@endsection