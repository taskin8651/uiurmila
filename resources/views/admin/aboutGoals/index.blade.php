@extends('layouts.admin')

@section('page-title', 'Long Term Goals')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Long Term Goals</h2>
        <p class="admin-page-subtitle">
            Manage About page long-term goals
        </p>
    </div>

    <a href="{{ route('admin.about-goals.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Goal
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Goals</p>
        <p class="stat-value">{{ $aboutGoals->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $aboutGoals->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $aboutGoals->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $aboutGoals->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Goals</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use table actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutGoal">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Goal</th>
                    <th>Button</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($aboutGoals as $goal)
                    <tr data-entry-id="{{ $goal->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $goal->id }}</span>
                        </td>

                        <td>
                            <span class="code-pill">{{ $goal->number ?? '-' }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle">
                                    <i class="{{ $goal->icon ?: 'fas fa-flag' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $goal->title }}</p>
                                    <p class="table-sub-text">{{ Str::limit($goal->description, 70) }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $goal->button_text ?? '-' }}
                        </td>

                        <td>
                            <span class="id-text">{{ $goal->sort_order ?? 0 }}</span>
                        </td>

                        <td>
                            @if($goal->status)
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
                                <a href="{{ route('admin.about-goals.show', $goal->id) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.about-goals.edit', $goal->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-goals.destroy', $goal->id) }}"
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
    initAdminDataTable('.datatable-AboutGoal', {
        searchPlaceholder: 'Search goals...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ goals'
    });
});
</script>
@endsection
