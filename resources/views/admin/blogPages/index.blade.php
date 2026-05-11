@extends('layouts.admin')

@section('page-title', 'Blog Page')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Blog Page</h2>
        <p class="admin-page-subtitle">Manage blog listing and detail page content.</p>
    </div>
    <a href="{{ route('admin.blog-pages.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Blog Page</a>
</div>

<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total</p><p class="stat-value">{{ $blogPages->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Active</p><p class="stat-value">{{ $blogPages->where('status', true)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Inactive</p><p class="stat-value">{{ $blogPages->where('status', false)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Latest</p><p class="stat-value">#{{ optional($blogPages->first())->id ?? 0 }}</p></div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Blog Page Records</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Usually one active record is enough</span>
    </div>
    <div class="page-card-table">
        <table class="min-w-full datatable datatable-BlogPage">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hero Title</th>
                    <th>List Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogPages as $blogPage)
                    <tr>
                        <td><span class="id-text">#{{ $blogPage->id }}</span></td>
                        <td><p class="table-main-text">{{ $blogPage->hero_title }}</p><p class="table-sub-text">{{ $blogPage->hero_badge }}</p></td>
                        <td>{{ $blogPage->list_title }}</td>
                        <td><span class="status-pill {{ $blogPage->status ? 'success' : 'warning' }}">{{ $blogPage->status ? 'Active' : 'Inactive' }}</span></td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.blog-pages.show', $blogPage) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('admin.blog-pages.edit', $blogPage) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{ route('admin.blog-pages.destroy', $blogPage) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @csrf @method('DELETE')
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
    initAdminDataTable('.datatable-BlogPage', { searchPlaceholder: 'Search blog page...', infoText: 'Showing _START_-_END_ of _TOTAL_ records' });
});
</script>
@endsection
