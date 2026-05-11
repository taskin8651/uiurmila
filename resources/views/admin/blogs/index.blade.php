@extends('layouts.admin')

@section('page-title', 'Blogs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Blogs</h2>
        <p class="admin-page-subtitle">
            Manage blog listing, article details and frontend content.
        </p>
    </div>

    <a href="{{ route('admin.blogs.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Blog
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Blogs</p>
        <p class="stat-value">{{ $blogs->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $blogs->where('is_featured', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $blogs->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Categories</p>
        <p class="stat-value">{{ $blogs->pluck('category')->filter()->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Blogs</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Blog detail page opens by slug
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Blog">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Article</th>
                    <th>Category</th>
                    <th>Published Date</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>
                            <span class="id-text">#{{ $blog->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $blog->title }}</p>
                            <p class="table-sub-text">{{ $blog->slug }}</p>
                        </td>

                        <td>{{ $blog->category ?? '-' }}</td>

                        <td>{{ $blog->published_date ?? '-' }}</td>

                        <td>
                            @if($blog->is_featured)
                                <span class="status-pill success">Featured</span>
                            @else
                                <span class="status-pill warning">Normal</span>
                            @endif
                        </td>

                        <td>
                            @if($blog->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.blogs.show', $blog) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.blogs.destroy', $blog) }}"
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

                @if($blogs->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">No blog found</td>
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
    initAdminDataTable('.datatable-Blog', {
        searchPlaceholder: 'Search blogs...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ blogs'
    });
});
</script>
@endsection