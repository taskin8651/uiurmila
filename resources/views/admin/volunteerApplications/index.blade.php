@extends('layouts.admin')

@section('page-title', 'Volunteer Applications')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Volunteer Applications</h2>
        <p class="admin-page-subtitle">Applications submitted from the volunteer page.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Applications</p>
        <p class="stat-value">{{ $volunteerApplications->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">New</p>
        <p class="stat-value">{{ $volunteerApplications->where('status', 'new')->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $volunteerApplications->where('status', 'read')->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Contacted</p>
        <p class="stat-value">{{ $volunteerApplications->where('status', 'contacted')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Volunteer Applications</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Volunteer form submissions by website visitors
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-VolunteerApplication">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Volunteer</th>
                    <th>Contact</th>
                    <th>Interest</th>
                    <th>Availability</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($volunteerApplications as $application)
                    <tr>
                        <td><span class="id-text">#{{ $application->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $application->full_name ?: '-' }}</p>
                            <p class="table-sub-text">{{ optional($application->created_at)->format('d M Y, h:i A') }}</p>
                        </td>
                        <td>
                            <p class="table-main-text">{{ $application->email ?: '-' }}</p>
                            <p class="table-sub-text">{{ $application->mobile_number ?: '-' }}</p>
                        </td>
                        <td>{{ $application->area_of_interest ?: '-' }}</td>
                        <td>{{ $application->availability ?: '-' }}</td>
                        <td>
                            @if($application->status === 'new')
                                <span class="status-pill warning">New</span>
                            @else
                                <span class="status-pill success">{{ ucfirst($application->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.volunteer-applications.show', $application) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.volunteer-applications.edit', $application) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Status
                                </a>
                                <form action="{{ route('admin.volunteer-applications.destroy', $application) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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

                @if($volunteerApplications->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">No volunteer application found.</td>
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
    initAdminDataTable('.datatable-VolunteerApplication', {
        searchPlaceholder: 'Search volunteer applications...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ applications'
    });
});
</script>
@endsection
