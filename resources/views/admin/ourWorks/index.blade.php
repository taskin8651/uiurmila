@extends('layouts.admin')

@section('page-title', 'Our Work Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Our Work Page</h2>
        <p class="admin-page-subtitle">Manage frontend Our Work page content</p>
    </div>

    <a href="{{ route('admin.our-works.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Our Work Content
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total Records</p><p class="stat-value">{{ $ourWorks->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Active</p><p class="stat-value">{{ $ourWorks->where('status', 1)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Inactive</p><p class="stat-value">{{ $ourWorks->where('status', 0)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Added Today</p><p class="stat-value">{{ $ourWorks->where('created_at', '>=', now()->startOfDay())->count() }}</p></div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Our Work Content</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Only active record will show on frontend</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-OurWork">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Hero</th>
                    <th>Categories Title</th>
                    <th>CTA Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ourWorks as $ourWork)
                    <tr data-entry-id="{{ $ourWork->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $ourWork->id }}</span></td>
                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle"><i class="fas fa-briefcase"></i></div>
                                <div>
                                    <p class="table-main-text">{{ $ourWork->hero_title ?? '-' }}</p>
                                    <p class="table-sub-text">{{ Str::limit($ourWork->hero_badge, 45) }}</p>
                                </div>
                            </div>
                        </td>
                        <td style="color:#475569;">{{ $ourWork->categories_title ?? '-' }}</td>
                        <td style="color:#475569;">{{ $ourWork->cta_title ?? '-' }}</td>
                        <td>
                            @if($ourWork->status)
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-success"></span><span style="font-size:12.5px;color:#374151;">Active</span></div>
                            @else
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-warning"></span><span style="font-size:12.5px;color:#92400E;">Inactive</span></div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.our-works.show', $ourWork->id) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('admin.our-works.edit', $ourWork->id) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{ route('admin.our-works.destroy', $ourWork->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-outline btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-OurWork', {
        searchPlaceholder: 'Search our work content...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ records'
    });
});
</script>
@endsection
