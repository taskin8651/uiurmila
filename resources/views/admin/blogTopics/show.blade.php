@extends('layouts.admin')

@section('page-title', 'Blog Topic Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-topics.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">{{ $blogTopic->title }}</h2>

        <p class="admin-page-subtitle">
            {{ $blogTopic->description }}
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.blog-topics.edit', $blogTopic) }}" class="btn-primary">
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
                    <i class="{{ $blogTopic->icon ?: 'fas fa-tags' }}"></i>
                </div>

                <p class="profile-title">
                    {{ $blogTopic->title }}
                </p>

                <p class="profile-subtitle">
                    {{ $blogTopic->description ?: 'Blog topic card' }}
                </p>

                @if($blogTopic->status)
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
                    <i class="fas fa-tags"></i>
                </div>

                <p class="detail-section-title">Topic Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value">#{{ $blogTopic->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        <i class="{{ $blogTopic->icon }}"></i>
                        {{ $blogTopic->icon ?: '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $blogTopic->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $blogTopic->description ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $blogTopic->sort_order ?? 0 }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($blogTopic->status)
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