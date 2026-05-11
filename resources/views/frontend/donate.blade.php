@extends('frontend.master')

@section('content')

@php
    $donatePage = $donatePage ?? null;

    $quickAmounts = collect(preg_split('/[\r\n,]+/', $donatePage->quick_amounts ?? '501,1100,2100,5100'))->map(fn ($value) => trim($value))->filter()->values();
    $paymentModes = collect(preg_split('/[\r\n,]+/', $donatePage->payment_modes ?? 'UPI,Bank Transfer,Cash,Cheque,Online Payment Gateway'))->map(fn ($value) => trim($value))->filter()->values();
    $donationPurposes = collect(preg_split('/[\r\n,]+/', $donatePage->donation_purposes ?? 'Education Support,Healthcare Camp,Food Support,Women Empowerment,Environment Awareness,General Donation'))->map(fn ($value) => trim($value))->filter()->values();
@endphp

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
                            {{ $donatePage->hero_badge ?? 'Donate for Social Change' }}
                        </span>

                        <h1>{{ $donatePage->hero_title ?? "Your Support Can Change Someone's Life" }}</h1>

                        <p>{{ $donatePage->hero_description ?? 'Every contribution helps URMILA Development Foundation support education, healthcare, women empowerment, food assistance, environmental awareness, and community welfare programs.' }}</p>

                        <div class="donation-hero-actions">
                            <a href="#donation-form" class="btn btn-primary-custom">
                                {{ $donatePage->hero_primary_button_text ?? 'Donate Now' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                            <a href="#payment-details" class="btn btn-outline-custom">
                                {{ $donatePage->hero_secondary_button_text ?? 'View Payment Details' }}
                            </a>
                        </div>

                        <nav aria-label="breadcrumb" class="donation-breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Donate</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="donation-hero-side">
                        <div class="donation-impact-card">
                            <div class="donation-impact-icon">
                                <i class="{{ $donatePage->hero_feature_icon ?? 'bi bi-people-fill' }}"></i>
                            </div>

                            <div>
                                <h4>{{ $donatePage->hero_feature_title ?? 'Support Real Impact' }}</h4>
                                <p>{{ $donatePage->hero_feature_text ?? 'Your donation directly supports community welfare initiatives.' }}</p>
                            </div>
                        </div>

                        <div class="donation-mini-grid">
                            @foreach([
                                [$donatePage->hero_card_one_icon ?? 'bi bi-book-fill', $donatePage->hero_card_one_title ?? 'Education'],
                                [$donatePage->hero_card_two_icon ?? 'bi bi-heart-pulse-fill', $donatePage->hero_card_two_title ?? 'Healthcare'],
                                [$donatePage->hero_card_three_icon ?? 'bi bi-basket-fill', $donatePage->hero_card_three_title ?? 'Food Support'],
                                [$donatePage->hero_card_four_icon ?? 'bi bi-person-hearts', $donatePage->hero_card_four_title ?? 'Empowerment'],
                            ] as [$icon, $title])
                                <div class="donation-mini-card">
                                    <i class="{{ $icon }}"></i>
                                    <h5>{{ $title }}</h5>
                                </div>
                            @endforeach
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
                {{ $donatePage->why_badge ?? 'Why Donate' }}
            </span>

            <h2 class="section-title">{{ $donatePage->why_title ?? 'Your Contribution Creates Hope' }}</h2>

            <p class="section-text mx-auto">
                {{ $donatePage->why_description ?? 'Donations help us continue meaningful social programs and reach more people who need support, care, opportunity, and awareness.' }}
            </p>
        </div>

        <div class="row g-4">
            @foreach([
                ['bi bi-mortarboard-fill', 'Support Education', 'Help children and communities with learning support and awareness.'],
                ['bi bi-hospital-fill', 'Healthcare Access', 'Support medical camps, health awareness, and wellness activities.'],
                ['bi bi-cup-hot-fill', 'Food Assistance', 'Help provide food and nutrition support to families in need.'],
                ['bi bi-tree-fill', 'Green Future', 'Support plantation drives and environmental awareness programs.'],
            ] as [$icon, $title, $text])
                <div class="col-md-6 col-lg-3">
                    <div class="why-donate-card">
                        <div class="why-icon">
                            <i class="{{ $icon }}"></i>
                        </div>
                        <h4>{{ $title }}</h4>
                        <p>{{ $text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- WHY DONATE END -->

<!-- DONATION FORM + PAYMENT START -->
<section class="section-padding donation-form-section" id="donation-form">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="donation-form-card">
                    <span class="section-badge donation-form-badge">
                        <i class="bi bi-pencil-square"></i>
                        {{ $donatePage->form_badge ?? 'Donation Form' }}
                    </span>

                    <h2>{{ $donatePage->form_title ?? 'Make a Donation' }}</h2>

                    <p class="donation-form-text">
                        {{ $donatePage->form_description ?? 'Fill in your details and donation purpose. Online payment gateway can be integrated separately if required and approved.' }}
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form class="donation-form" method="POST" action="{{ route('frontend.donate.store') }}">
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
                                <label>Donation Amount</label>
                                <input type="number" name="amount" value="{{ old('amount') }}" class="form-control @error('amount') is-invalid @enderror" placeholder="Rs. Amount" min="1" step="1">
                                @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label>Select Quick Amount</label>

                                <div class="donation-amount-options">
                                    @foreach($quickAmounts as $amount)
                                        <button type="button" data-amount="{{ $amount }}">Rs. {{ $amount }}</button>
                                    @endforeach
                                </div>

                                <input type="hidden" name="quick_amount" value="{{ old('quick_amount') }}">
                            </div>

                            <div class="col-md-6">
                                <label>Payment Mode</label>
                                <select name="payment_mode" class="form-select @error('payment_mode') is-invalid @enderror">
                                    <option value="">Select payment mode</option>
                                    @foreach($paymentModes as $mode)
                                        <option value="{{ $mode }}" {{ old('payment_mode') === $mode ? 'selected' : '' }}>{{ $mode }}</option>
                                    @endforeach
                                </select>
                                @error('payment_mode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label>Donation Purpose</label>
                                <select name="donation_purpose" class="form-select @error('donation_purpose') is-invalid @enderror">
                                    <option value="">Select purpose</option>
                                    @foreach($donationPurposes as $purpose)
                                        <option value="{{ $purpose }}" {{ old('donation_purpose') === $purpose ? 'selected' : '' }}>{{ $purpose }}</option>
                                    @endforeach
                                </select>
                                @error('donation_purpose')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label>Message / Purpose</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" placeholder="Write your message or donation purpose">{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-custom donation-submit-btn">
                                    {{ $donatePage->form_button_text ?? 'Submit Donation Details' }}
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5" id="payment-details">
                <div class="payment-details-card">
                    <span class="section-badge payment-badge">
                        <i class="bi bi-bank"></i>
                        {{ $donatePage->payment_badge ?? 'Payment Details' }}
                    </span>

                    <h2>{{ $donatePage->payment_title ?? 'Bank / UPI Details' }}</h2>

                    <p class="payment-text">
                        {{ $donatePage->payment_description ?? 'Use the following details for donation transfer. Please share payment confirmation with our donation support team.' }}
                    </p>

                    <div class="qr-box">
                        @if($donatePage && $donatePage->qr_image)
                            <img src="{{ asset('uploads/donate/' . $donatePage->qr_image) }}" alt="UPI QR Code" class="img-fluid">
                        @else
                            <div class="qr-placeholder">
                                <i class="bi bi-qr-code"></i>
                                <span>UPI QR Code</span>
                            </div>
                        @endif
                    </div>

                    <ul class="payment-list">
                        @foreach([
                            ['bi bi-building', 'Account Name', $donatePage->account_name ?? 'URMILA Development Foundation'],
                            ['bi bi-bank2', 'Bank Name', $donatePage->bank_name ?? 'To be updated'],
                            ['bi bi-credit-card', 'Account Number', $donatePage->account_number ?? 'To be updated'],
                            ['bi bi-upc-scan', 'IFSC / UPI ID', $donatePage->ifsc_upi ?? 'To be updated'],
                        ] as [$icon, $label, $value])
                            <li>
                                <i class="{{ $icon }}"></i>
                                <div>
                                    <strong>{{ $label }}</strong>
                                    <span>{{ $value }}</span>
                                </div>
                            </li>
                        @endforeach
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
                        <span class="section-badge tax-badge">{{ $donatePage->tax_badge ?? 'Tax Information' }}</span>
                        <h3>{{ $donatePage->tax_title ?? 'Tax Exemption Details' }}</h3>
                        <p>{{ $donatePage->tax_description ?? 'Tax exemption details such as 80G / 12A can be displayed here, if applicable and provided by the foundation.' }}</p>

                        <ul>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $donatePage->tax_point_one ?? '80G / 12A details: To be updated' }}
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                {{ $donatePage->tax_point_two ?? 'Donation receipt details: To be updated' }}
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
                        <span class="section-badge tax-badge">{{ $donatePage->support_badge ?? 'Donation Support' }}</span>
                        <h3>{{ $donatePage->support_title ?? 'Need Help With Donation?' }}</h3>
                        <p>{{ $donatePage->support_description ?? 'Contact our donation support person for bank details, receipts, confirmations, and campaign-specific support.' }}</p>

                        <div class="donation-support-links">
                            <a href="tel:{{ $donatePage->support_phone ?? '+910000000000' }}">
                                <i class="bi bi-telephone"></i>
                                {{ $donatePage->support_phone ?? '+91 00000 00000' }}
                            </a>
                            <a href="mailto:{{ $donatePage->support_email ?? 'info@urmila.org' }}">
                                <i class="bi bi-envelope"></i>
                                {{ $donatePage->support_email ?? 'info@urmila.org' }}
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
                <span>{{ $donatePage->cta_badge ?? 'Give With Purpose' }}</span>
                <h2>{{ $donatePage->cta_title ?? 'Together, We Can Build Stronger Communities' }}</h2>
                <p>{{ $donatePage->cta_description ?? 'Donate, volunteer, or partner with us to create sustainable social impact.' }}</p>
            </div>

            <div class="donation-cta-actions">
                <a href="#donation-form" class="btn btn-light-custom">
                    {{ $donatePage->cta_primary_button_text ?? 'Donate Now' }}
                </a>

                <a href="{{ $donatePage->cta_secondary_button_link ?? route('frontend.contact') }}" class="btn btn-outline-light-custom">
                    {{ $donatePage->cta_secondary_button_text ?? 'Contact Us' }}
                </a>
            </div>
        </div>
    </div>
</section>
<!-- DONATION CTA END -->

@endsection

@section('scripts')
@parent
<script>
document.querySelectorAll('.donation-amount-options button[data-amount]').forEach(function (button) {
    button.addEventListener('click', function () {
        var amount = this.getAttribute('data-amount');
        var form = this.closest('form');

        form.querySelector('input[name="amount"]').value = amount;
        form.querySelector('input[name="quick_amount"]').value = amount;
    });
});
</script>
@endsection
