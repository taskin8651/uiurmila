@extends('layouts.admin')

@section('page-title', 'Blog Page Details')

@section('content')
<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-pages.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">{{ $blogPage->hero_title ?: 'Blog Page' }}</h2>
        <p class="admin-page-subtitle">{{ $blogPage->hero_description }}</p>
    </div>
    <div class="show-actions">
        <a href="{{ route('admin.blog-pages.edit', $blogPage) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
</div>

<div class="show-grid">
    <div class="detail-card detail-card-pad">
        <p class="quick-title">Status</p>
        <span class="status-pill {{ $blogPage->status ? 'success' : 'warning' }}">{{ $blogPage->status ? 'Active' : 'Inactive' }}</span>
        <div class="quick-list mt-3">
            <a href="{{ route('admin.blog-pages.index') }}" class="quick-link"><i class="fas fa-list"></i> All Blog Pages</a>
            <a href="{{ route('admin.blogs.index') }}" class="quick-link primary"><i class="fas fa-newspaper"></i> Blogs</a>
        </div>
    </div>
    <div class="detail-card">
        <div class="detail-section-head"><div class="detail-section-icon"><i class="fas fa-info-circle"></i></div><p class="detail-section-title">Content Summary</p></div>
        <div class="detail-section-body">
            @foreach(['hero_badge','hero_title','list_title','topics_title','newsletter_title','related_title','detail_cta_title'] as $field)
                <div class="detail-row"><span class="detail-label">{{ ucwords(str_replace('_', ' ', $field)) }}</span><span class="detail-value">{{ $blogPage->$field ?: '-' }}</span></div>
            @endforeach
        </div>
    </div>
</div>
@endsection
