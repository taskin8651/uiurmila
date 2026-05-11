@extends('layouts.admin')

@section('page-title', 'Show Our Work Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.our-works.index') }}" class="admin-back-link">&larr; Back To List</a>
        <h2 class="admin-page-title">Our Work Page Details</h2>
        <p class="admin-page-subtitle">Full details for frontend Our Work page content</p>
    </div>

    <div class="show-actions">
        <a href="{{ route('admin.our-works.edit', $ourWork->id) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit Our Work</a>
        <form action="{{ route('admin.our-works.destroy', $ourWork->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg"><i class="fas fa-briefcase"></i></div>
                <p class="profile-title">{{ $ourWork->hero_title ?? 'Our Work Page' }}</p>
                <p class="profile-subtitle">{{ $ourWork->hero_badge ?? 'Our Work content record' }}</p>
                @if($ourWork->status)
                    <span class="status-pill success"><i class="fas fa-check-circle"></i> Active</span>
                @else
                    <span class="status-pill warning"><i class="fas fa-clock"></i> Inactive</span>
                @endif
            </div>
            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns:1fr 1fr;">
                    <div class="stat-mini"><p class="stat-mini-label">Record ID</p><p class="stat-mini-value">#{{ $ourWork->id }}</p></div>
                    <div class="stat-mini"><p class="stat-mini-label">Status</p><p class="stat-mini-value-sm">{{ $ourWork->status ? 'Active' : 'Inactive' }}</p></div>
                    <div class="stat-mini" style="grid-column:span 2;"><p class="stat-mini-label">Created</p><p class="stat-mini-value-sm">{{ optional($ourWork->created_at)->format('d M Y') ?? '-' }}</p></div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>
            <div class="quick-list">
                <a href="{{ route('admin.our-works.edit', $ourWork->id) }}" class="quick-link primary"><i class="fas fa-pencil-alt"></i> Edit Our Work</a>
                <a href="{{ route('admin.our-works.index') }}" class="quick-link"><i class="fas fa-list"></i> All Records</a>
                <a href="{{ route('admin.our-works.create') }}" class="quick-link"><i class="fas fa-plus"></i> Add New Record</a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-list"></i></div>
                <p class="detail-section-title">Content Details</p>
            </div>
            <div class="detail-section-body">
                @foreach($ourWork->getAttributes() as $key => $value)
                    @if(!in_array($key, ['id','created_at','updated_at','deleted_at']))
                        <div class="detail-row">
                            <span class="detail-label">{{ ucwords(str_replace('_', ' ', $key)) }}</span>
                            <span class="detail-value">{{ $key === 'status' ? ($value ? 'Active' : 'Inactive') : ($value ?? '-') }}</span>
                        </div>
                    @endif
                @endforeach
                <div class="detail-row"><span class="detail-label">Created At</span><span class="detail-value">{{ optional($ourWork->created_at)->format('d M Y, H:i') ?? '-' }}</span></div>
                <div class="detail-row"><span class="detail-label">Updated At</span><span class="detail-value">{{ optional($ourWork->updated_at)->format('d M Y, H:i') ?? '-' }}</span></div>
            </div>
        </div>
    </div>
</div>

@endsection
