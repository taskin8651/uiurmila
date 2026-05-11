@extends('layouts.admin')

@section('page-title', 'Blog Topics')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Blog Topics</h2>

        <p class="admin-page-subtitle">
            Manage topic cards shown on blog page.
        </p>
    </div>

    <a href="{{ route('admin.blog-topics.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Topic
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Topics</p>
        <p class="stat-value">{{ $blogTopics->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $blogTopics->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $blogTopics->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Latest</p>
        <p class="stat-value">
            #{{ optional($blogTopics->first())->id ?? 0 }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Topics</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Active topics will show on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-BlogTopic">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                    <th>Icon</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($blogTopics as $blogTopic)
                    <tr>
                        <td>
                            <span class="id-text">#{{ $blogTopic->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $blogTopic->title }}
                            </p>

                            <p class="table-sub-text">
                                {{ $blogTopic->description ?: '-' }}
                            </p>
                        </td>

                        <td>
                            <i class="{{ $blogTopic->icon }}"></i>
                            {{ $blogTopic->icon ?: '-' }}
                        </td>

                        <td>
                            {{ $blogTopic->sort_order ?? 0 }}
                        </td>

                        <td>
                            @if($blogTopic->status)
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
                                <a href="{{ route('admin.blog-topics.show', $blogTopic) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.blog-topics.edit', $blogTopic) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.blog-topics.destroy', $blogTopic) }}"
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

                @if($blogTopics->count() == 0)
                    <tr>
                        <td colspan="6" class="text-center">
                            No blog topic found.
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
    initAdminDataTable('.datatable-BlogTopic', {
        searchPlaceholder: 'Search blog topics...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ topics'
    });
});
</script>
@endsection