@extends('layouts.admin')

@section('page-title', 'Show Core Value')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-values.index') }}" class="admin-back-link">
            &larr; Back To List
        </a>

        <h2 class="admin-page-title">Core Value Details</h2>

        <p class="admin-page-subtitle">
            Full details for this About page core value
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.about-values.edit', $aboutValue->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Core Value
        </a>

        <form action="{{ route('admin.about-values.destroy', $aboutValue->id) }}"
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
                    <i class="{{ $aboutValue->icon ?: 'fas fa-gem' }}"></i>
                </div>

                <p class="profile-title">{{ $aboutValue->title }}</p>
                <p class="profile-subtitle">{{ $aboutValue->number ? 'Value ' . $aboutValue->number : 'Core Value' }}</p>

                @if($aboutValue->status)
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
                        <p class="stat-mini-label">Value ID</p>
                        <p class="stat-mini-value">#{{ $aboutValue->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $aboutValue->sort_order ?? 0 }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($aboutValue->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.about-values.edit', $aboutValue->id) }}" class="quick-link primary">
                    <i class="fas fa-pencil-alt"></i>
                    Edit Core Value
                </a>

                <a href="{{ route('admin.about-values.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Core Values
                </a>

                <a href="{{ route('admin.about-values.create') }}" class="quick-link">
                    <i class="fas fa-plus"></i>
                    Add New Value
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-gem"></i>
                </div>

                <p class="detail-section-title">Value Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $aboutValue->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Number</span>
                    <span class="detail-value">{{ $aboutValue->number ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        <i class="{{ $aboutValue->icon ?: 'fas fa-gem' }}"></i>
                        {{ $aboutValue->icon ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $aboutValue->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $aboutValue->description ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($aboutValue->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($aboutValue->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
