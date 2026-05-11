@extends('layouts.admin')

@section('page-title', 'Program Categories')

@section('content')
<div class="admin-page-head">
    <div><h2 class="admin-page-title">Program Categories</h2><p class="admin-page-subtitle">Manage Our Work focus area cards</p></div>
    <a href="{{ route('admin.our-work-categories.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Category</a>
</div>
<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total Categories</p><p class="stat-value">{{ $ourWorkCategories->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Active</p><p class="stat-value">{{ $ourWorkCategories->where('status', 1)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Inactive</p><p class="stat-value">{{ $ourWorkCategories->where('status', 0)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Added Today</p><p class="stat-value">{{ $ourWorkCategories->where('created_at', '>=', now()->startOfDay())->count() }}</p></div>
</div>
<div class="page-card">
    <div class="page-card-header"><p class="page-card-title">All Categories</p><span class="page-card-note"><i class="fas fa-info-circle"></i> Select rows to use table actions</span></div>
    <div class="page-card-table">
        <table class="min-w-full datatable datatable-OurWorkCategory">
            <thead><tr><th style="width:40px;"></th><th>ID</th><th>Category</th><th>Meta</th><th>Sort</th><th>Status</th><th style="text-align:right;">Actions</th></tr></thead>
            <tbody>
                @foreach($ourWorkCategories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td><td><span class="id-text">#{{ $category->id }}</span></td>
                        <td><div class="inline-flex-center"><div class="avatar-circle"><i class="{{ $category->icon ?: 'fas fa-layer-group' }}"></i></div><div><p class="table-main-text">{{ $category->title }}</p><p class="table-sub-text">{{ Str::limit($category->description, 70) }}</p></div></div></td>
                        <td style="color:#475569;">{{ $category->meta_one_text ?? '-' }} / {{ $category->meta_two_text ?? '-' }}</td>
                        <td><span class="id-text">{{ $category->sort_order ?? 0 }}</span></td>
                        <td>@if($category->status)<div class="d-flex align-items-center gap-2"><span class="status-dot status-success"></span><span style="font-size:12.5px;color:#374151;">Active</span></div>@else<div class="d-flex align-items-center gap-2"><span class="status-dot status-warning"></span><span style="font-size:12.5px;color:#92400E;">Inactive</span></div>@endif</td>
                        <td><div class="action-row"><a href="{{ route('admin.our-work-categories.show', $category->id) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a><a href="{{ route('admin.our-work-categories.edit', $category->id) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a><form action="{{ route('admin.our-work-categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">@method('DELETE')@csrf<button type="submit" class="btn-outline btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button></form></div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>$(function(){initAdminDataTable('.datatable-OurWorkCategory',{searchPlaceholder:'Search categories...',infoText:'Showing _START_-_END_ of _TOTAL_ categories'});});</script>
@endsection
