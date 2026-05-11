<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>URMILA Development Foundation</title>
    <meta name="description"
        content="Gadsec Solutions provides CCTV surveillance, fire safety, access control, intrusion alarm, ICT infrastructure, automation, installation and AMC support for commercial, industrial, institutional and government projects.">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0B2D4D">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
@php
    $site = $globalWebsiteSetting ?? null;
    $siteName = $site?->site_name ?? 'URMILA Development Foundation';
    $siteLogo = $site?->logo ? asset('uploads/settings/' . $site->logo) : asset('assets/img/logo-1.png');
    $footerLogo = $site?->footer_logo ? asset('uploads/settings/' . $site->footer_logo) : $siteLogo;
    $sitePhone = $site?->phone ?? '+91 79 7976 0133';
    $sitePhoneLink = 'tel:' . preg_replace('/[^0-9+]/', '', $sitePhone);
    $siteEmail = $site?->email ?? 'info@domainname.com';
    $siteAddress = $site?->address ?? 'Lalita Bhawan, Boring Rd, Gandhi Nagar, Sri Krishna Puri, Patna, Bihar 800013';
@endphp

    <!-- ================= HEADER START ================= -->
    <header class="main-header sticky-top">
        <nav class="navbar navbar-expand-lg premium-navbar">
            <div class="container">

                <!-- Logo -->
                <a class="navbar-brand premium-brand logo-only-brand" href="{{ url('/') }}"
                    aria-label="{{ $siteName }}">
                    <span class="brand-logo-wrap">
                        <img src="{{ $siteLogo }}" alt="{{ $siteName }}" class="site-logo">
                    </span>
                </a>

                <!-- Mobile Donate Icon -->
                <a href="{{ $site?->donate_button_link ?? 'donate.html' }}" class="mobile-donate-icon d-lg-none" aria-label="Donate Now">
                    <i class="bi bi-heart-fill"></i>
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler premium-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse premium-menu" id="mainNavbar">

                    <!-- Mobile Menu Header -->
                    <div class="mobile-menu-title d-lg-none">
                        <div>
                            <h6>Explore Menu</h6>
                            <p>Join us in creating positive social impact.</p>
                        </div>

                        <span class="mobile-menu-badge">
                            NGO
                        </span>
                    </div>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-house-door"></i>
                                </span>
                                <span>Home</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-info-circle"></i>
                                </span>
                                <span>About Us</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.our-work') ? 'active' : '' }}" href="{{ route('frontend.our-work') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-grid-1x2"></i>
                                </span>
                                <span>Our Work</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.campaigns*') ? 'active' : '' }}" href="{{ route('frontend.campaigns') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-calendar2-event"></i>
                                </span>
                                <span>Campaigns</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.gallery') ? 'active' : '' }}" href="{{ route('frontend.gallery') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-images"></i>
                                </span>
                                <span>Gallery</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.blog*') ? 'active' : '' }}" href="{{ route('frontend.blog') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-newspaper"></i>
                                </span>
                                <span>Blog</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">
                                <span class="mobile-link-icon d-lg-none">
                                    <i class="bi bi-headset"></i>
                                </span>
                                <span>Contact</span>
                                <i class="bi bi-chevron-right mobile-link-arrow d-lg-none"></i>
                            </a>
                        </li>

                        <li class="nav-item ms-lg-3 donate-nav-item">
                            <a class="btn btn-donate" href="{{ $site?->donate_button_link ?? 'donate.html' }}">
                                <i class="bi bi-heart-fill me-1"></i>
                                {{ $site?->donate_button_text ?? 'Donate Now' }}
                            </a>
                        </li>

                    </ul>

                    <!-- Mobile Bottom Contact -->
                    <div class="mobile-menu-footer d-lg-none">
                        <a href="{{ $sitePhoneLink }}">
                            <i class="bi bi-telephone"></i>
                            {{ $sitePhone }}
                        </a>

                        <a href="mailto:{{ $siteEmail }}">
                            <i class="bi bi-envelope"></i>
                            {{ $siteEmail }}
                        </a>
                    </div>

                </div>

            </div>
        </nav>
    </header>
    <!-- ================= HEADER END ================= -->

    @yield('content')

    
    <!-- ================= FOOTER START ================= -->
    <footer class="footer-section">
        <div class="container">

            <div class="footer-main">

                <div class="row g-4">

                    <!-- About -->
                    <div class="col-lg-4">
                        <div class="footer-widget footer-about">

                            <div class="footer-logo-box">
                                <img src="{{ $footerLogo }}" alt="{{ $siteName }}"
                                    class="footer-logo-img">

                                <div>
                                    <h4>{{ $siteName }}</h4>
                                    <span>Community • Care • Change</span>
                                </div>
                            </div>

                            <p>
                                {{ $site?->footer_about ?? 'Working for community development, social welfare, education, healthcare, women empowerment, and environmental awareness.' }}
                            </p>

                            <div class="footer-social">
                                <a href="{{ $site?->facebook_link ?? '#' }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $site?->instagram_link ?? '#' }}" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $site?->youtube_link ?? '#' }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                                <a href="{{ $site?->twitter_link ?? '#' }}" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                            </div>

                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h5>Quick Links</h5>

                            <ul>
                                <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
                                <li><a href="{{ route('frontend.about') }}"><i class="bi bi-chevron-right"></i> About Us</a></li>
                                <li><a href="{{ route('frontend.our-work') }}"><i class="bi bi-chevron-right"></i> Our Work</a></li>
                                <li><a href="{{ route('frontend.campaigns') }}"><i class="bi bi-chevron-right"></i> Campaigns</a></li>
                                <li><a href="{{ route('frontend.blog') }}"><i class="bi bi-chevron-right"></i> Blog</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Support -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h5>Support</h5>

                            <ul>
                                <li><a href="{{ $site?->donate_button_link ?? 'donate.html' }}"><i class="bi bi-chevron-right"></i> {{ $site?->donate_button_text ?? 'Donate Now' }}</a></li>
                                <li><a href="{{ $site?->volunteer_button_link ?? 'volunteer.html' }}"><i class="bi bi-chevron-right"></i> {{ $site?->volunteer_button_text ?? 'Become Volunteer' }}</a>
                                </li>
                                <li><a href="testimonials.html"><i class="bi bi-chevron-right"></i> Impact Stories</a>
                                </li>
                                <li><a href="faq.html"><i class="bi bi-chevron-right"></i> FAQs</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="col-lg-3">
                        <div class="footer-widget footer-contact">
                            <h5>Contact</h5>

                            <a href="{{ route('frontend.contact') }}" class="footer-contact-item">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $siteAddress }}</span>
                            </a>

                            <a href="{{ $sitePhoneLink }}" class="footer-contact-item">
                                <i class="bi bi-telephone"></i>
                                <span>{{ $sitePhone }}</span>
                            </a>

                            <a href="mailto:{{ $siteEmail }}" class="footer-contact-item">
                                <i class="bi bi-envelope"></i>
                                <span>{{ $siteEmail }}</span>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Footer CTA Strip -->
                <div class="footer-cta">
                    <div>
                        <h6>Want to support our social mission?</h6>
                        <p>Join as a donor, volunteer, or community partner.</p>
                    </div>

                    <a href="{{ $site?->donate_button_link ?? 'donate.html' }}" class="footer-cta-btn">
                        {{ $site?->donate_button_text ?? 'Donate Now' }}
                        <i class="bi bi-heart-fill"></i>
                    </a>
                </div>

            </div>

            <div class="footer-bottom">
                <p class="mb-0">
                    © 2026 URMILA Development Foundation. All Rights Reserved.
                </p>

                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <span>|</span>
                    <a href="#">Terms</a>
                </div>
            </div>

        </div>
    </footer>
    <!-- ================= FOOTER END ================= -->




    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
