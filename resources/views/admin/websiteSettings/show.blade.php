@extends('layouts.admin')

@section('page-title', 'Website Setting Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.website-settings.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            {{ $websiteSetting->site_name ?: 'Website Setting' }}
        </h2>

        <p class="admin-page-subtitle">
            {{ $websiteSetting->footer_tagline ?: 'Common website setting details' }}
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.website-settings.edit', $websiteSetting) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit
        </a>
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg">
                    @if($websiteSetting->logo)
                        <img src="{{ asset('uploads/website/' . $websiteSetting->logo) }}"
                             alt="{{ $websiteSetting->site_name }}"
                             style="width:100%;height:100%;object-fit:contain;">
                    @else
                        <i class="fas fa-globe"></i>
                    @endif
                </div>

                <p class="profile-title">
                    {{ $websiteSetting->site_name ?: 'Website Setting' }}
                </p>

                <p class="profile-subtitle">
                    {{ $websiteSetting->email ?: '-' }}
                </p>

                @if($websiteSetting->status)
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

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Brand Images</p>
            </div>

            <div class="detail-section-body">
                @foreach(['logo','footer_logo','favicon'] as $field)
                    <div class="detail-row">
                        <span class="detail-label">
                            {{ ucwords(str_replace('_', ' ', $field)) }}
                        </span>

                        <span class="detail-value">
                            @if($websiteSetting->$field)
                                <img src="{{ asset('uploads/website/' . $websiteSetting->$field) }}"
                                     alt="{{ $field }}"
                                     style="width:80px;height:55px;object-fit:contain;border:1px solid #E5E7EB;border-radius:10px;background:#fff;">
                            @else
                                -
                            @endif
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Website Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'email',
                    'phone',
                    'alternate_phone',
                    'whatsapp_number',
                    'address',
                    'city',
                    'state',
                    'pincode',
                    'office_time',
                    'map_link',
                    'map_embed_url',
                    'facebook_link',
                    'instagram_link',
                    'youtube_link',
                    'twitter_link',
                    'linkedin_link',
                    'footer_about',
                    'copyright_text',
                    'donate_button_text',
                    'donate_button_link',
                    'volunteer_button_text',
                    'volunteer_button_link'
                ] as $field)
                    <div class="detail-row">
                        <span class="detail-label">
                            {{ ucwords(str_replace('_', ' ', $field)) }}
                        </span>

                        <span class="detail-value">
                            {{ $websiteSetting->$field ?: '-' }}
                        </span>
                    </div>
                @endforeach

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($websiteSetting->status)
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