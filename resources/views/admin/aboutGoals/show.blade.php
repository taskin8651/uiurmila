@extends('layouts.admin')

@section('page-title', 'Show Goal')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-goals.index') }}" class="admin-back-link">
            &larr; Back To List
        </a>

        <h2 class="admin-page-title">Goal Details</h2>

        <p class="admin-page-subtitle">
            Full details for this long-term goal
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.about-goals.edit', $aboutGoal->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Goal
        </a>

        <form action="{{ route('admin.about-goals.destroy', $aboutGoal->id) }}"
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
                    <i class="{{ $aboutGoal->icon ?: 'fas fa-flag' }}"></i>
                </div>

                <p class="profile-title">{{ $aboutGoal->title }}</p>
                <p class="profile-subtitle">{{ $aboutGoal->number ? 'Goal ' . $aboutGoal->number : 'Long Term Goal' }}</p>

                @if($aboutGoal->status)
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
                        <p class="stat-mini-label">Goal ID</p>
                        <p class="stat-mini-value">#{{ $aboutGoal->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $aboutGoal->sort_order ?? 0 }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($aboutGoal->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.about-goals.edit', $aboutGoal->id) }}" class="quick-link primary">
                    <i class="fas fa-pencil-alt"></i>
                    Edit Goal
                </a>

                <a href="{{ route('admin.about-goals.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Goals
                </a>

                <a href="{{ route('admin.about-goals.create') }}" class="quick-link">
                    <i class="fas fa-plus"></i>
                    Add New Goal
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-flag"></i>
                </div>

                <p class="detail-section-title">Goal Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $aboutGoal->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Number</span>
                    <span class="detail-value">{{ $aboutGoal->number ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        <i class="{{ $aboutGoal->icon ?: 'fas fa-flag' }}"></i>
                        {{ $aboutGoal->icon ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $aboutGoal->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $aboutGoal->description ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button</span>
                    <span class="detail-value">
                        {{ $aboutGoal->button_text ?? '-' }}
                        @if($aboutGoal->button_link)
                            <a href="{{ $aboutGoal->button_link }}" target="_blank" class="send-mail-link">{{ $aboutGoal->button_link }}</a>
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($aboutGoal->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($aboutGoal->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
