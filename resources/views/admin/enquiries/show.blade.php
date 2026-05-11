@extends('layouts.admin')

@section('page-title', 'Enquiry Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.enquiries.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            {{ $enquiry->subject ?: 'Enquiry' }}
        </h2>

        <p class="admin-page-subtitle">
            Submitted by {{ $enquiry->name ?: 'Visitor' }}
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.enquiries.edit', $enquiry) }}" class="btn-primary">
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
                    <i class="fas fa-envelope-open-text"></i>
                </div>

                <p class="profile-title">
                    {{ $enquiry->name ?: 'Visitor' }}
                </p>

                <p class="profile-subtitle">
                    {{ optional($enquiry->created_at)->format('d M Y, h:i A') }}
                </p>

                @if($enquiry->status === 'new')
                    <span class="status-pill warning">
                        New
                    </span>
                @elseif($enquiry->status === 'read')
                    <span class="status-pill success">
                        Read
                    </span>
                @elseif($enquiry->status === 'replied')
                    <span class="status-pill success">
                        Replied
                    </span>
                @else
                    <span class="status-pill warning">
                        {{ ucfirst($enquiry->status) }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-user"></i>
                </div>

                <p class="detail-section-title">Visitor Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value">#{{ $enquiry->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $enquiry->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $enquiry->email ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $enquiry->phone ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Subject</span>
                    <span class="detail-value">{{ $enquiry->subject ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Submitted At</span>
                    <span class="detail-value">
                        {{ optional($enquiry->created_at)->format('d M Y, h:i A') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="detail-card mt-3">
    <div class="detail-section-head">
        <div class="detail-section-icon">
            <i class="fas fa-comment-dots"></i>
        </div>

        <p class="detail-section-title">Message</p>
    </div>

    <div class="detail-section-body">
        <div class="detail-value">
            {!! nl2br(e($enquiry->message ?: '-')) !!}
        </div>
    </div>
</div>

@endsection