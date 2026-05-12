@extends('layouts.admin')

@section('page-title', 'Testimonial Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Testimonial Details</h2>
        <p class="admin-page-subtitle">{{ $testimonial->name }}</p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-primary">
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
                    <i class="{{ $testimonial->icon ?: 'fas fa-comment-dots' }}"></i>
                </div>
                <p class="profile-title">{{ $testimonial->name }}</p>
                <p class="profile-subtitle">{{ $testimonial->designation ?: 'Testimonial' }}</p>
                @if($testimonial->status)
                    <span class="status-pill success">Active</span>
                @else
                    <span class="status-pill warning">Inactive</span>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <p class="detail-section-title">Testimonial Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'ID' => '#' . $testimonial->id,
                    'Icon' => $testimonial->icon,
                    'Name' => $testimonial->name,
                    'Designation' => $testimonial->designation,
                    'Sort Order' => $testimonial->sort_order ?? 0,
                    'Created At' => optional($testimonial->created_at)->format('d M Y, H:i'),
                ] as $label => $value)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $value ?: '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="detail-card mt-3">
    <div class="detail-section-head">
        <div class="detail-section-icon">
            <i class="fas fa-quote-left"></i>
        </div>
        <p class="detail-section-title">Message</p>
    </div>
    <div class="detail-section-body">
        <div class="detail-value">{!! nl2br(e($testimonial->message)) !!}</div>
    </div>
</div>

@endsection
