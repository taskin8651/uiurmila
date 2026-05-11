@extends('layouts.admin')

@section('page-title', 'Sidebar Category Details')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-sidebar-categories.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">{{ $blogSidebarCategory->title }}</h2></div><div class="show-actions"><a href="{{ route('admin.blog-sidebar-categories.edit',$blogSidebarCategory) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></div></div>
<div class="detail-card"><div class="detail-section-body"><div class="detail-row"><span class="detail-label">Count</span><span class="detail-value">{{ $blogSidebarCategory->count }}</span></div><div class="detail-row"><span class="detail-label">Link</span><span class="detail-value">{{ $blogSidebarCategory->link }}</span></div><div class="detail-row"><span class="detail-label">Sort Order</span><span class="detail-value">{{ $blogSidebarCategory->sort_order }}</span></div><div class="detail-row"><span class="detail-label">Status</span><span class="status-pill {{ $blogSidebarCategory->status ? 'success' : 'warning' }}">{{ $blogSidebarCategory->status ? 'Active' : 'Inactive' }}</span></div></div></div>
@endsection
