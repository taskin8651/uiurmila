@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>

        <p class="admin-page-subtitle">
            Manage common website logo, contact, social media and footer data.
        </p>
    </div>

    <a href="{{ route('admin.website-settings.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Setting
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Settings</p>
        <p class="stat-value">{{ $websiteSettings->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $websiteSettings->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $websiteSettings->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Latest</p>
        <p class="stat-value">
            #{{ optional($websiteSettings->first())->id ?? 0 }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Website Settings</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Usually one active record is used on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-WebsiteSetting">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Site</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($websiteSettings as $websiteSetting)
                    <tr>
                        <td>
                            <span class="id-text">#{{ $websiteSetting->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $websiteSetting->site_name ?: '-' }}
                            </p>

                            <p class="table-sub-text">
                                {{ $websiteSetting->footer_tagline ?: '-' }}
                            </p>
                        </td>

                        <td>{{ $websiteSetting->phone ?: '-' }}</td>

                        <td>{{ $websiteSetting->email ?: '-' }}</td>

                        <td>{{ $websiteSetting->city ?: '-' }}</td>

                        <td>
                            @if($websiteSetting->status)
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
                                <a href="{{ route('admin.website-settings.show', $websiteSetting) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.website-settings.edit', $websiteSetting) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.website-settings.destroy', $websiteSetting) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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

                @if($websiteSettings->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">
                            No website setting found.
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
    initAdminDataTable('.datatable-WebsiteSetting', {
        searchPlaceholder: 'Search website settings...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ settings'
    });
});
</script>
@endsection