@extends('layouts.admin')

@section('page-title', 'Core Values')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Core Values</h2>
        <p class="admin-page-subtitle">
            Manage About page core values
        </p>
    </div>

    <a href="{{ route('admin.about-values.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Core Value
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Values</p>
        <p class="stat-value">{{ $aboutValues->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $aboutValues->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $aboutValues->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $aboutValues->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Core Values</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use table actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutValue">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Value</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($aboutValues as $value)
                    <tr data-entry-id="{{ $value->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $value->id }}</span>
                        </td>

                        <td>
                            <span class="code-pill">{{ $value->number ?? '-' }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle">
                                    <i class="{{ $value->icon ?: 'fas fa-gem' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $value->title }}</p>
                                    <p class="table-sub-text">{{ Str::limit($value->description, 70) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="id-text">{{ $value->sort_order ?? 0 }}</span>
                        </td>

                        <td>
                            @if($value->status)
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
                                <a href="{{ route('admin.about-values.show', $value->id) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.about-values.edit', $value->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-values.destroy', $value->id) }}"
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
    initAdminDataTable('.datatable-AboutValue', {
        searchPlaceholder: 'Search values...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ values'
    });
});
</script>
@endsection
