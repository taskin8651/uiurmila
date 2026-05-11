@extends('layouts.admin')

@section('page-title', 'Show Objective')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-objectives.index') }}" class="admin-back-link">
            &larr; Back To List
        </a>

        <h2 class="admin-page-title">Objective Details</h2>

        <p class="admin-page-subtitle">
            Full details for this About page objective
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.about-objectives.edit', $aboutObjective->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Objective
        </a>

        <form action="{{ route('admin.about-objectives.destroy', $aboutObjective->id) }}"
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
                    <i class="{{ $aboutObjective->icon ?: 'fas fa-list-check' }}"></i>
                </div>

                <p class="profile-title">Objective #{{ $aboutObjective->id }}</p>
                <p class="profile-subtitle">{{ Str::limit($aboutObjective->title, 90) }}</p>

                @if($aboutObjective->status)
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
                        <p class="stat-mini-label">Objective ID</p>
                        <p class="stat-mini-value">#{{ $aboutObjective->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $aboutObjective->sort_order ?? 0 }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($aboutObjective->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.about-objectives.edit', $aboutObjective->id) }}" class="quick-link primary">
                    <i class="fas fa-pencil-alt"></i>
                    Edit Objective
                </a>

                <a href="{{ route('admin.about-objectives.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Objectives
                </a>

                <a href="{{ route('admin.about-objectives.create') }}" class="quick-link">
                    <i class="fas fa-plus"></i>
                    Add New Objective
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <p class="detail-section-title">Objective Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $aboutObjective->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        <i class="{{ $aboutObjective->icon ?: 'fas fa-list-check' }}"></i>
                        {{ $aboutObjective->icon ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Objective</span>
                    <span class="detail-value">{{ $aboutObjective->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($aboutObjective->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($aboutObjective->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
