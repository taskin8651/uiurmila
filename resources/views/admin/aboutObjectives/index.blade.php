@extends('layouts.admin')

@section('page-title', 'Objectives')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Objectives</h2>
        <p class="admin-page-subtitle">
            Manage About page objectives
        </p>
    </div>

    <a href="{{ route('admin.about-objectives.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Objective
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Objectives</p>
        <p class="stat-value">{{ $aboutObjectives->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $aboutObjectives->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $aboutObjectives->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $aboutObjectives->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Objectives</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use table actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutObjective">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Objective</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($aboutObjectives as $objective)
                    <tr data-entry-id="{{ $objective->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $objective->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle">
                                    <i class="{{ $objective->icon ?: 'fas fa-list-check' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ Str::limit($objective->title, 90) }}</p>
                                    <p class="table-sub-text">{{ $objective->icon ?? 'No icon selected' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="id-text">{{ $objective->sort_order ?? 0 }}</span>
                        </td>

                        <td>
                            @if($objective->status)
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
                                <a href="{{ route('admin.about-objectives.show', $objective->id) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.about-objectives.edit', $objective->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-objectives.destroy', $objective->id) }}"
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
    initAdminDataTable('.datatable-AboutObjective', {
        searchPlaceholder: 'Search objectives...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ objectives'
    });
});
</script>
@endsection
