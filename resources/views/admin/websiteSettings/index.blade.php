@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')
<div class="admin-page-head">
    <div><h2 class="admin-page-title">Website Settings</h2><p class="admin-page-subtitle">Manage common website logo, contact, social and footer data.</p></div>
    <a href="{{ route('admin.website-settings.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Setting</a>
</div>
<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total</p><p class="stat-value">{{ $websiteSettings->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Active</p><p class="stat-value">{{ $websiteSettings->where('status', true)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Inactive</p><p class="stat-value">{{ $websiteSettings->where('status', false)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Latest</p><p class="stat-value">#{{ optional($websiteSettings->first())->id ?? 0 }}</p></div>
</div>
<div class="page-card">
    <div class="page-card-header"><p class="page-card-title">All Settings</p><span class="page-card-note"><i class="fas fa-info-circle"></i> Usually one active record is used</span></div>
    <div class="page-card-table">
        <table class="min-w-full datatable datatable-WebsiteSetting">
            <thead><tr><th>ID</th><th>Site</th><th>Phone</th><th>Email</th><th>Status</th><th style="text-align:right;">Actions</th></tr></thead>
            <tbody>
                @foreach($websiteSettings as $websiteSetting)
                    <tr>
                        <td><span class="id-text">#{{ $websiteSetting->id }}</span></td>
                        <td><p class="table-main-text">{{ $websiteSetting->site_name }}</p><p class="table-sub-text">{{ $websiteSetting->footer_tagline }}</p></td>
                        <td>{{ $websiteSetting->phone }}</td>
                        <td>{{ $websiteSetting->email }}</td>
                        <td><span class="status-pill {{ $websiteSetting->status ? 'success' : 'warning' }}">{{ $websiteSetting->status ? 'Active' : 'Inactive' }}</span></td>
                        <td><div class="action-row"><a href="{{ route('admin.website-settings.show', $websiteSetting) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a><a href="{{ route('admin.website-settings.edit', $websiteSetting) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a><form action="{{ route('admin.website-settings.destroy', $websiteSetting) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">@csrf @method('DELETE')<button class="btn-outline btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button></form></div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
