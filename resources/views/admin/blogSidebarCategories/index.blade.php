@extends('layouts.admin')

@section('page-title', 'Blog Sidebar Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Blog Sidebar Categories</h2>

        <p class="admin-page-subtitle">
            Manage categories shown in blog detail sidebar.
        </p>
    </div>

    <a href="{{ route('admin.blog-sidebar-categories.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Category
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Categories</p>
        <p class="stat-value">{{ $blogSidebarCategories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $blogSidebarCategories->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $blogSidebarCategories->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Latest</p>
        <p class="stat-value">
            #{{ optional($blogSidebarCategories->first())->id ?? 0 }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Sidebar Categories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Active categories will show on frontend sidebar
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-BlogSidebarCategory">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Count</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($blogSidebarCategories as $blogSidebarCategory)
                    <tr>
                        <td>
                            <span class="id-text">#{{ $blogSidebarCategory->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $blogSidebarCategory->title }}
                            </p>

                            <p class="table-sub-text">
                                {{ $blogSidebarCategory->link ?: '-' }}
                            </p>
                        </td>

                        <td>
                            {{ $blogSidebarCategory->count ?? 0 }}
                        </td>

                        <td>
                            {{ $blogSidebarCategory->sort_order ?? 0 }}
                        </td>

                        <td>
                            @if($blogSidebarCategory->status)
                                <span class="status-pill success">
                                    Active
                                </span>
                            @else
                                <span class="status-pill warning">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.blog-sidebar-categories.show', $blogSidebarCategory) }}"
                                   class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.blog-sidebar-categories.edit', $blogSidebarCategory) }}"
                                   class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.blog-sidebar-categories.destroy', $blogSidebarCategory) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-outline btn-outline-danger" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if($blogSidebarCategories->count() == 0)
                    <tr>
                        <td colspan="6" class="text-center">
                            No sidebar category found.
                        </td>
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
    initAdminDataTable('.datatable-BlogSidebarCategory', {
        searchPlaceholder: 'Search sidebar categories...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ categories'
    });
});
</script>
@endsection