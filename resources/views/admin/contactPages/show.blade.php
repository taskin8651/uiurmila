@extends('layouts.admin')

@section('page-title', 'Contact Page Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-pages.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            {{ $contactPage->hero_title ?: 'Contact Page' }}
        </h2>

        <p class="admin-page-subtitle">
            {{ $contactPage->hero_description ?: 'Contact page dynamic content details' }}
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.contact-pages.edit', $contactPage) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit
        </a>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card">
            <div class="profile-hero">
                <div class="profile-avatar-lg">
                    <i class="fas fa-address-book"></i>
                </div>

                <p class="profile-title">
                    {{ $contactPage->hero_title ?: 'Contact Page' }}
                </p>

                <p class="profile-subtitle">
                    {{ $contactPage->hero_badge ?: '-' }}
                </p>

                @if($contactPage->status)
                    <span class="status-pill success">
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        Inactive
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-address-book"></i>
                </div>

                <p class="detail-section-title">Contact Page Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'hero_badge',
                    'hero_title',
                    'hero_description',
                    'hero_primary_button_text',
                    'hero_secondary_button_text',
                    'hero_feature_icon',
                    'hero_feature_title',
                    'hero_feature_text',
                    'hero_card_one_icon',
                    'hero_card_one_title',
                    'hero_card_two_icon',
                    'hero_card_two_title',
                    'hero_card_three_icon',
                    'hero_card_three_title',
                    'hero_card_four_icon',
                    'hero_card_four_title',
                    'info_badge',
                    'info_title',
                    'info_description',
                    'form_badge',
                    'form_title',
                    'form_description',
                    'support_badge',
                    'support_title',
                    'support_description',
                    'support_person_title',
                    'support_person_subtitle',
                    'map_badge',
                    'map_title',
                    'map_description',
                    'map_button_text',
                    'cta_badge',
                    'cta_title',
                    'cta_description',
                    'cta_primary_button_text',
                    'cta_primary_button_link',
                    'cta_secondary_button_text',
                    'cta_secondary_button_link'
                ] as $field)
                    <div class="detail-row">
                        <span class="detail-label">
                            {{ ucwords(str_replace('_', ' ', $field)) }}
                        </span>

                        <span class="detail-value">
                            {{ $contactPage->$field ?: '-' }}
                        </span>
                    </div>
                @endforeach

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($contactPage->status)
                        <span class="status-pill success">
                            Active
                        </span>
                    @else
                        <span class="status-pill warning">
                            Inactive
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection