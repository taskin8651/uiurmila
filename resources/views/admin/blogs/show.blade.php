@extends('layouts.admin')

@section('page-title', 'Blog Details')

@section('content')
<div class="admin-page-head">
    <div><a href="{{ route('admin.blogs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">{{ $blog->title }}</h2><p class="admin-page-subtitle">{{ $blog->short_description }}</p></div>
    <div class="show-actions"><a href="{{ route('admin.blogs.edit', $blog) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></div>
</div>
<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            @if($blog->image)<img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="{{ $blog->title }}" style="width:100%;height:260px;object-fit:cover;border-radius:8px 8px 0 0;">@endif
            <div class="detail-section-pad-sm">
                <span class="status-pill {{ $blog->status ? 'success' : 'warning' }}">{{ $blog->status ? 'Active' : 'Inactive' }}</span>
                @if($blog->is_featured)<span class="role-tag">Featured</span>@endif
            </div>
        </div>
    </div>
    <div class="detail-card">
        <div class="detail-section-head"><div class="detail-section-icon"><i class="fas fa-newspaper"></i></div><p class="detail-section-title">Article Details</p></div>
        <div class="detail-section-body">
            @foreach(['category','published_date','author','slug','highlight_title','tags'] as $field)
                <div class="detail-row"><span class="detail-label">{{ ucwords(str_replace('_', ' ', $field)) }}</span><span class="detail-value">{{ $blog->$field ?: '-' }}</span></div>
            @endforeach
            <div class="detail-row"><span class="detail-label">Quote</span><span class="detail-value">{{ $blog->quote ?: '-' }}</span></div>
        </div>
    </div>
</div>
@endsection
