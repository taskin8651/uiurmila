@extends('layouts.admin')

@section('page-title', 'Blog Topic Details')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-topics.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">{{ $blogTopic->title }}</h2><p class="admin-page-subtitle">{{ $blogTopic->description }}</p></div><div class="show-actions"><a href="{{ route('admin.blog-topics.edit',$blogTopic) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></div></div>
<div class="detail-card"><div class="detail-section-body"><div class="detail-row"><span class="detail-label">Icon</span><span class="detail-value">{{ $blogTopic->icon }}</span></div><div class="detail-row"><span class="detail-label">Sort Order</span><span class="detail-value">{{ $blogTopic->sort_order }}</span></div><div class="detail-row"><span class="detail-label">Status</span><span class="status-pill {{ $blogTopic->status ? 'success' : 'warning' }}">{{ $blogTopic->status ? 'Active' : 'Inactive' }}</span></div></div></div>
@endsection
