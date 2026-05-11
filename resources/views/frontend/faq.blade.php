@extends('frontend.master')
@section('content')

@php
    $faqs = $faqs ?? collect();
@endphp

    <!-- FAQ HERO START -->
    <section class="faq-hero">
        <div class="container">

            <div class="faq-hero-box text-center">

                <span class="section-badge faq-hero-badge">
                    <i class="bi bi-question-circle-fill"></i>
                    Frequently Asked Questions
                </span>

                <h1>FAQs</h1>

                <p>
                    Find quick answers about URMILA Development Foundation,
                    donations, volunteering, CSR partnership and contact support.
                </p>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            FAQs
                        </li>
                    </ol>
                </nav>

            </div>

        </div>
    </section>
    <!-- FAQ HERO END -->


    <!-- FAQ SECTION START -->
    <section class="section-padding faq-section">
        <div class="container">

            <div class="row g-4 align-items-start">

                <div class="col-lg-5">
                    <div class="faq-info-card">

                        <span class="section-badge faq-info-badge">
                            <i class="bi bi-info-circle-fill"></i>
                            Need Help?
                        </span>

                        <h2>Common Questions Answered</h2>

                        <p>
                            If you have questions about our work, donation process,
                            volunteer joining or partnership opportunities, check the answers here.
                        </p>

                        <div class="faq-help-box">
                            <i class="bi bi-headset"></i>

                            <div>
                                <h5>Still have questions?</h5>
                                <a href="{{ route('frontend.contact') }}">Contact our team</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="faq-accordion-card">

                        <div class="accordion" id="faqAccordion">

                            @forelse($faqs as $faq)
                                @php
                                    $headingId = 'faqHeading' . $faq->id;
                                    $collapseId = 'faqCollapse' . $faq->id;
                                    $isFirst = $loop->first;
                                @endphp

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{ $headingId }}">
                                        <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                            aria-controls="{{ $collapseId }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>

                                    <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                        aria-labelledby="{{ $headingId }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqHeadingDefault">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqCollapseDefault" aria-expanded="true"
                                            aria-controls="faqCollapseDefault">
                                            What is URMILA Development Foundation?
                                        </button>
                                    </h2>

                                    <div id="faqCollapseDefault" class="accordion-collapse collapse show"
                                        aria-labelledby="faqHeadingDefault" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            URMILA Development Foundation is a social welfare organization working for education, healthcare, women empowerment, awareness, environment and community development.
                                        </div>
                                    </div>
                                </div>
                            @endforelse

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- FAQ SECTION END -->


    <!-- FAQ CTA START -->
    <section class="faq-cta-section">
        <div class="container">

            <div class="faq-cta-box">
                <div>
                    <span>Need More Information?</span>
                    <h2>Connect With Our Team</h2>
                    <p>
                        Reach out for donation, volunteer, CSR or campaign-related support.
                    </p>
                </div>

                <div class="faq-cta-actions">
                    <a href="{{ route('frontend.contact') }}" class="btn btn-light-custom">
                        Contact Us
                    </a>

                    <a href="{{ route('frontend.donate') }}" class="btn btn-outline-light-custom">
                        Donate Now
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- FAQ CTA END -->

@endsection
