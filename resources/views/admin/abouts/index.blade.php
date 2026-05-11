@extends('layouts.admin')

@section('page-title', 'About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Page</h2>
        <p class="admin-page-subtitle">
            Manage complete frontend About page dynamic content
        </p>
    </div>

    <a href="{{ route('admin.abouts.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add About Content
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Records</p>
        <p class="stat-value">{{ $abouts->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $abouts->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $abouts->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $abouts->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">About Page Content</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Only active record will show on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-About">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Hero</th>
                    <th>Intro</th>
                    <th>Mission</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($abouts as $about)
                    <tr data-entry-id="{{ $about->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $about->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle">
                                    <i class="fas fa-info-circle"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $about->hero_title ?? '-' }}</p>
                                    <p class="table-sub-text">{{ Str::limit($about->hero_badge, 45) }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $about->intro_title ?? '-' }}
                        </td>

                        <td style="color:#475569;">
                            {{ $about->mission_title ?? '-' }}
                        </td>

                        <td>
                            @if($about->status)
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
                                <a href="{{ route('admin.abouts.show', $about->id) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.abouts.destroy', $about->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @method('DELETE')
                                    @csrf

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
    initAdminDataTable('.datatable-About', {
        searchPlaceholder: 'Search about content...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ records'
    });
});
</script>
@endsection
