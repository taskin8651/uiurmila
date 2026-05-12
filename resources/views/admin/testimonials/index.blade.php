@extends('layouts.admin')

@section('page-title', 'Testimonials')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Testimonials</h2>
        <p class="admin-page-subtitle">Manage testimonial cards for the frontend impact stories page</p>
    </div>

    <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Testimonial
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Testimonials</p>
        <p class="stat-value">{{ $testimonials->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $testimonials->where('status', 1)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $testimonials->where('status', 0)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $testimonials->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Testimonials</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Active testimonials show on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Testimonial">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Person</th>
                    <th>Message</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td><span class="id-text">#{{ $testimonial->id }}</span></td>
                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle">
                                    <i class="{{ $testimonial->icon ?: 'fas fa-comment-dots' }}"></i>
                                </div>
                                <div>
                                    <p class="table-main-text">{{ $testimonial->name }}</p>
                                    <p class="table-sub-text">{{ $testimonial->designation ?: '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td>{{ Str::limit($testimonial->message, 90) }}</td>
                        <td><span class="id-text">{{ $testimonial->sort_order ?? 0 }}</span></td>
                        <td>
                            @if($testimonial->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-outline btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
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
    initAdminDataTable('.datatable-Testimonial', {
        searchPlaceholder: 'Search testimonials...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ testimonials'
    });
});
</script>
@endsection
