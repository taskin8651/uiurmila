@extends('layouts.admin')

@section('page-title', 'FAQs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">FAQs</h2>
        <p class="admin-page-subtitle">Manage frontend FAQ question and answer content.</p>
    </div>

    <a href="{{ route('admin.faqs.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add FAQ
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total FAQs</p>
        <p class="stat-value">{{ $faqs->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $faqs->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $faqs->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Latest</p>
        <p class="stat-value">#{{ optional($faqs->sortByDesc('id')->first())->id ?? 0 }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All FAQs</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Active FAQs show on frontend</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Faq">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td><span class="id-text">#{{ $faq->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $faq->question }}</p>
                            <p class="table-sub-text">{{ Str::limit($faq->answer, 90) }}</p>
                        </td>
                        <td>{{ $faq->sort_order ?? 0 }}</td>
                        <td>
                            @if($faq->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.faqs.show', $faq) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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

                @if($faqs->count() == 0)
                    <tr>
                        <td colspan="5" class="text-center">No FAQ found.</td>
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
    initAdminDataTable('.datatable-Faq', {
        searchPlaceholder: 'Search FAQ...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ records'
    });
});
</script>
@endsection
