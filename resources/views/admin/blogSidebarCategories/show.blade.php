@extends('layouts.admin')

@section('page-title', 'Sidebar Category Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-sidebar-categories.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">{{ $blogSidebarCategory->title }}</h2>

        <p class="admin-page-subtitle">
            Blog sidebar category details
        </p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.blog-sidebar-categories.edit', $blogSidebarCategory) }}" class="btn-primary">
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
                    <i class="fas fa-folder-open"></i>
                </div>

                <p class="profile-title">
                    {{ $blogSidebarCategory->title }}
                </p>

                <p class="profile-subtitle">
                    {{ $blogSidebarCategory->link ?: '-' }}
                </p>

                @if($blogSidebarCategory->status)
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
                    <i class="fas fa-folder-open"></i>
                </div>

                <p class="detail-section-title">Category Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value">#{{ $blogSidebarCategory->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $blogSidebarCategory->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Count</span>
                    <span class="detail-value">{{ $blogSidebarCategory->count ?? 0 }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Link</span>
                    <span class="detail-value">{{ $blogSidebarCategory->link ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $blogSidebarCategory->sort_order ?? 0 }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($blogSidebarCategory->status)
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