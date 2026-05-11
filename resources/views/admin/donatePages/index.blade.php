@extends('layouts.admin')

@section('page-title', 'Donate Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Donate Page</h2>
        <p class="admin-page-subtitle">Manage dynamic donation page, form, and payment details.</p>
    </div>

    <a href="{{ route('admin.donate-pages.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Donate Page
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Records</p>
        <p class="stat-value">{{ $donatePages->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $donatePages->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $donatePages->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Latest</p>
        <p class="stat-value">#{{ optional($donatePages->first())->id ?? 0 }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Donate Page Records</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Usually one active record is enough for frontend</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DonatePage">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hero Content</th>
                    <th>Form Title</th>
                    <th>Payment Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donatePages as $donatePage)
                    <tr>
                        <td><span class="id-text">#{{ $donatePage->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $donatePage->hero_title ?: '-' }}</p>
                            <p class="table-sub-text">{{ $donatePage->hero_badge ?: '-' }}</p>
                        </td>
                        <td>{{ $donatePage->form_title ?: '-' }}</td>
                        <td>{{ $donatePage->payment_title ?: '-' }}</td>
                        <td>
                            @if($donatePage->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.donate-pages.show', $donatePage) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.donate-pages.edit', $donatePage) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.donate-pages.destroy', $donatePage) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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

                @if($donatePages->count() == 0)
                    <tr>
                        <td colspan="6" class="text-center">No donate page record found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-DonatePage', {
        searchPlaceholder: 'Search donate page...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ records'
    });
});
</script>
@endsection
