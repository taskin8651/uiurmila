@extends('frontend.master')

@section('content')


    <!-- DONATION HERO START -->
    <section class="donation-hero">

        <span class="donation-hero-shape shape-one"></span>
        <span class="donation-hero-shape shape-two"></span>

        <div class="container">
            <div class="donation-hero-wrapper">

                <div class="row align-items-center g-4">

                    <div class="col-lg-7">
                        <div class="donation-hero-content">

                            <span class="section-badge donation-hero-badge">
                                <i class="bi bi-heart-fill"></i>
                                Donate for Social Change
                            </span>

                            <h1>
                                Your Support Can Change Someone’s Life
                            </h1>

                            <p>
                                Every contribution helps URMILA Development Foundation support
                                education, healthcare, women empowerment, food assistance,
                                environmental awareness, and community welfare programs.
                            </p>

                            <div class="donation-hero-actions">
                                <a href="#donation-form" class="btn btn-primary-custom">
                                    Donate Now
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>

                                <a href="#payment-details" class="btn btn-outline-custom">
                                    View Payment Details
                                </a>
                            </div>

                            <nav aria-label="breadcrumb" class="donation-breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Donate
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="donation-hero-side">

                            <div class="donation-impact-card">
                                <div class="donation-impact-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>

                                <div>
                                    <h4>Support Real Impact</h4>
                                    <p>Your donation directly supports community welfare initiatives.</p>
                                </div>
                            </div>

                            <div class="donation-mini-grid">

                                <div class="donation-mini-card">
                                    <i class="bi bi-book-fill"></i>
                                    <h5>Education</h5>
                                </div>

                                <div class="donation-mini-card">
                                    <i class="bi bi-heart-pulse-fill"></i>
                                    <h5>Healthcare</h5>
                                </div>

                                <div class="donation-mini-card">
                                    <i class="bi bi-basket-fill"></i>
                                    <h5>Food Support</h5>
                                </div>

                                <div class="donation-mini-card">
                                    <i class="bi bi-person-hearts"></i>
                                    <h5>Empowerment</h5>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- DONATION HERO END -->


    <!-- WHY DONATE START -->
    <section class="section-padding why-donate-section">
        <div class="container">

            <div class="text-center mb-5">
                <span class="section-badge donation-badge">
                    <i class="bi bi-stars"></i>
                    Why Donate
                </span>

                <h2 class="section-title">
                    Your Contribution Creates Hope
                </h2>

                <p class="section-text mx-auto">
                    Donations help us continue meaningful social programs and reach more
                    people who need support, care, opportunity, and awareness.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="why-donate-card">
                        <div class="why-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h4>Support Education</h4>
                        <p>Help children and communities with learning support and awareness.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="why-donate-card">
                        <div class="why-icon">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        <h4>Healthcare Access</h4>
                        <p>Support medical camps, health awareness, and wellness activities.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="why-donate-card">
                        <div class="why-icon">
                            <i class="bi bi-cup-hot-fill"></i>
                        </div>
                        <h4>Food Assistance</h4>
                        <p>Help provide food and nutrition support to families in need.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="why-donate-card">
                        <div class="why-icon">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <h4>Green Future</h4>
                        <p>Support plantation drives and environmental awareness programs.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- WHY DONATE END -->


    <!-- DONATION FORM + PAYMENT START -->
    <section class="section-padding donation-form-section" id="donation-form">
        <div class="container">

            <div class="row g-4 align-items-stretch">

                <!-- Donation Form -->
                <div class="col-lg-7">
                    <div class="donation-form-card">

                        <span class="section-badge donation-form-badge">
                            <i class="bi bi-pencil-square"></i>
                            Donation Form
                        </span>

                        <h2>Make a Donation</h2>

                        <p class="donation-form-text">
                            Fill in your details and donation purpose. Online payment gateway
                            can be integrated separately if required and approved.
                        </p>

                        <form class="donation-form">

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter full name">
                                </div>

                                <div class="col-md-6">
                                    <label>Mobile Number</label>
                                    <input type="tel" class="form-control" placeholder="+91 00000 00000">
                                </div>

                                <div class="col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter email address">
                                </div>

                                <div class="col-md-6">
                                    <label>Donation Amount</label>
                                    <input type="number" class="form-control" placeholder="₹ Amount">
                                </div>

                                <div class="col-12">
                                    <label>Select Quick Amount</label>

                                    <div class="donation-amount-options">
                                        <button type="button">₹501</button>
                                        <button type="button">₹1100</button>
                                        <button type="button">₹2100</button>
                                        <button type="button">₹5100</button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Payment Mode</label>
                                    <select class="form-select">
                                        <option selected>Select payment mode</option>
                                        <option>UPI</option>
                                        <option>Bank Transfer</option>
                                        <option>Cash</option>
                                        <option>Cheque</option>
                                        <option>Online Payment Gateway</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Donation Purpose</label>
                                    <select class="form-select">
                                        <option selected>Select purpose</option>
                                        <option>Education Support</option>
                                        <option>Healthcare Camp</option>
                                        <option>Food Support</option>
                                        <option>Women Empowerment</option>
                                        <option>Environment Awareness</option>
                                        <option>General Donation</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label>Message / Purpose</label>
                                    <textarea class="form-control" rows="4"
                                        placeholder="Write your message or donation purpose"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom donation-submit-btn">
                                        Submit Donation Details
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>

                <!-- Payment Details -->
                <div class="col-lg-5" id="payment-details">
                    <div class="payment-details-card">

                        <span class="section-badge payment-badge">
                            <i class="bi bi-bank"></i>
                            Payment Details
                        </span>

                        <h2>Bank / UPI Details</h2>

                        <p class="payment-text">
                            Use the following details for donation transfer. Please share
                            payment confirmation with our donation support team.
                        </p>

                        <div class="qr-box">
                            <div class="qr-placeholder">
                                <i class="bi bi-qr-code"></i>
                                <span>UPI QR Code</span>
                            </div>
                        </div>

                        <ul class="payment-list">
                            <li>
                                <i class="bi bi-building"></i>
                                <div>
                                    <strong>Account Name</strong>
                                    <span>URMILA Development Foundation</span>
                                </div>
                            </li>

                            <li>
                                <i class="bi bi-bank2"></i>
                                <div>
                                    <strong>Bank Name</strong>
                                    <span>To be updated</span>
                                </div>
                            </li>

                            <li>
                                <i class="bi bi-credit-card"></i>
                                <div>
                                    <strong>Account Number</strong>
                                    <span>To be updated</span>
                                </div>
                            </li>

                            <li>
                                <i class="bi bi-upc-scan"></i>
                                <div>
                                    <strong>IFSC / UPI ID</strong>
                                    <span>To be updated</span>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- DONATION FORM + PAYMENT END -->


    <!-- TAX + SUPPORT START -->
    <section class="section-padding donation-support-section">
        <div class="container">

            <div class="row g-4">

                <div class="col-lg-6">
                    <div class="tax-card">
                        <div class="tax-icon">
                            <i class="bi bi-file-earmark-check-fill"></i>
                        </div>

                        <div>
                            <span class="section-badge tax-badge">
                                Tax Information
                            </span>

                            <h3>Tax Exemption Details</h3>

                            <p>
                                Tax exemption details such as 80G / 12A can be displayed here,
                                if applicable and provided by the foundation.
                            </p>

                            <ul>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    80G / 12A details: To be updated
                                </li>

                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Donation receipt details: To be updated
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="donation-contact-card">
                        <div class="tax-icon">
                            <i class="bi bi-headset"></i>
                        </div>

                        <div>
                            <span class="section-badge tax-badge">
                                Donation Support
                            </span>

                            <h3>Need Help With Donation?</h3>

                            <p>
                                Contact our donation support person for bank details,
                                receipts, confirmations, and campaign-specific support.
                            </p>

                            <div class="donation-support-links">
                                <a href="tel:+910000000000">
                                    <i class="bi bi-telephone"></i>
                                    +91 00000 00000
                                </a>

                                <a href="mailto:info@urmila.org">
                                    <i class="bi bi-envelope"></i>
                                    info@urmila.org
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- TAX + SUPPORT END -->


    <!-- DONATION CTA START -->
    <section class="donation-cta-section">
        <div class="container">

            <div class="donation-cta-box">
                <div>
                    <span>Give With Purpose</span>
                    <h2>Together, We Can Build Stronger Communities</h2>
                    <p>
                        Donate, volunteer, or partner with us to create sustainable social impact.
                    </p>
                </div>

                <div class="donation-cta-actions">
                    <a href="#donation-form" class="btn btn-light-custom">
                        Donate Now
                    </a>

                    <a href="contact.html" class="btn btn-outline-light-custom">
                        Contact Us
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- DONATION CTA END -->

@endsection