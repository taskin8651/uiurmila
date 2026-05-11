@extends('layouts.admin')

@section('page-title', 'Volunteer Application Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.volunteer-applications.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">{{ $volunteerApplication->full_name ?: 'Volunteer Application' }}</h2>
        <p class="admin-page-subtitle">Submitted volunteer application details</p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.volunteer-applications.edit', $volunteerApplication) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Update Status
        </a>
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card">
            <div class="profile-hero">
                <div class="profile-avatar-lg">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <p class="profile-title">{{ $volunteerApplication->full_name ?: 'Volunteer' }}</p>
                <p class="profile-subtitle">{{ optional($volunteerApplication->created_at)->format('d M Y, h:i A') }}</p>
                <span class="status-pill {{ $volunteerApplication->status === 'new' ? 'warning' : 'success' }}">
                    {{ ucfirst($volunteerApplication->status) }}
                </span>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-user"></i></div>
                <p class="detail-section-title">Volunteer Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'ID' => '#' . $volunteerApplication->id,
                    'Name' => $volunteerApplication->full_name,
                    'Email' => $volunteerApplication->email,
                    'Mobile' => $volunteerApplication->mobile_number,
                    'City / Location' => $volunteerApplication->city,
                    'Area of Interest' => $volunteerApplication->area_of_interest,
                    'Availability' => $volunteerApplication->availability,
                    'Submitted At' => optional($volunteerApplication->created_at)->format('d M Y, h:i A'),
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
        <div class="detail-section-icon"><i class="fas fa-comment-dots"></i></div>
        <p class="detail-section-title">Message</p>
    </div>

    <div class="detail-section-body">
        <div class="detail-value">{!! nl2br(e($volunteerApplication->message ?: '-')) !!}</div>
    </div>
</div>

@endsection
