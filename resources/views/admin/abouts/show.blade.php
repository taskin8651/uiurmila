@extends('layouts.admin')

@section('page-title', 'Show About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.abouts.index') }}" class="admin-back-link">
            &larr; Back To List
        </a>

        <h2 class="admin-page-title">About Page Details</h2>

        <p class="admin-page-subtitle">
            Full details for frontend About page content
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit About
        </a>

        <form action="{{ route('admin.abouts.destroy', $about->id) }}"
              method="POST"
              onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete
            </button>
        </form>
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="profile-title">{{ $about->hero_title ?? 'About Page' }}</p>
                <p class="profile-subtitle">{{ $about->hero_badge ?? 'About content record' }}</p>

                @if($about->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Record ID</p>
                        <p class="stat-mini-value">#{{ $about->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Status</p>
                        <p class="stat-mini-value-sm">{{ $about->status ? 'Active' : 'Inactive' }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($about->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad mb-3">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.abouts.edit', $about->id) }}" class="quick-link primary">
                    <i class="fas fa-pencil-alt"></i>
                    Edit About Page
                </a>

                <a href="{{ route('admin.abouts.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All About Records
                </a>

                <a href="{{ route('admin.abouts.create') }}" class="quick-link">
                    <i class="fas fa-plus"></i>
                    Add New About
                </a>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Images</p>
            </div>

            <div class="detail-section-pad-sm">
                <p class="detail-label">Intro Image</p>
                @if($about->intro_image)
                    <img src="{{ asset('uploads/about/' . $about->intro_image) }}"
                         alt="Intro Image"
                         style="width:100%;max-height:230px;object-fit:cover;border-radius:16px;border:1px solid #E5E7EB;">
                @else
                    <p class="detail-value">No image uploaded</p>
                @endif

                <hr>

                <p class="detail-label">Founder Image</p>
                @if($about->founder_image)
                    <img src="{{ asset('uploads/about/' . $about->founder_image) }}"
                         alt="Founder Image"
                         style="width:100%;max-height:230px;object-fit:cover;border-radius:16px;border:1px solid #E5E7EB;">
                @else
                    <p class="detail-value">No image uploaded</p>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-heading"></i>
                </div>

                <p class="detail-section-title">Hero & Introduction</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'hero_badge' => 'Hero Badge',
                    'hero_title' => 'Hero Title',
                    'hero_description' => 'Hero Description',
                    'hero_tag_one' => 'Hero Tag One',
                    'hero_tag_two' => 'Hero Tag Two',
                    'hero_tag_three' => 'Hero Tag Three',
                    'intro_badge' => 'Intro Badge',
                    'intro_title' => 'Intro Title',
                    'intro_description_one' => 'Intro Description One',
                    'intro_description_two' => 'Intro Description Two',
                ] as $field => $label)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $about->$field ?? '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-book"></i>
                </div>

                <p class="detail-section-title">Story, Mission & Vision</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'story_title' => 'Story Title',
                    'story_short_description' => 'Story Short Description',
                    'story_description_one' => 'Story Description One',
                    'story_description_two' => 'Story Description Two',
                    'mission_section_title' => 'Mission Section Title',
                    'mission_title' => 'Mission Title',
                    'mission_description' => 'Mission Description',
                    'vision_title' => 'Vision Title',
                    'vision_description' => 'Vision Description',
                ] as $field => $label)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $about->$field ?? '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file-contract"></i>
                </div>

                <p class="detail-section-title">Legal & Founder Details</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'legal_organization_name' => 'Organization Name',
                    'legal_registration_no' => 'Registration Number',
                    'legal_pan_details' => 'PAN / 80G / 12A',
                    'legal_registered_address' => 'Registered Address',
                    'founder_title' => 'Founder Title',
                    'founder_message' => 'Founder Message',
                    'founder_designation' => 'Founder Designation',
                    'founder_organization' => 'Founder Organization',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                ] as $field => $label)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">
                            @if(in_array($field, ['created_at', 'updated_at']))
                                {{ optional($about->$field)->format('d M Y, H:i') ?? '-' }}
                            @else
                                {{ $about->$field ?? '-' }}
                            @endif
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
