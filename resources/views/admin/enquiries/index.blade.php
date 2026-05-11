@extends('layouts.admin')

@section('page-title', 'Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Enquiries</h2>

        <p class="admin-page-subtitle">
            Messages submitted from the contact page.
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $enquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">New</p>
        <p class="stat-value">{{ $enquiries->where('status', 'new')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $enquiries->where('status', 'read')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Replied</p>
        <p class="stat-value">{{ $enquiries->where('status', 'replied')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Enquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Contact form messages submitted by website visitors
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Enquiry">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Visitor</th>
                    <th>Contact</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($enquiries as $enquiry)
                    <tr>
                        <td>
                            <span class="id-text">#{{ $enquiry->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $enquiry->name ?: '-' }}
                            </p>

                            <p class="table-sub-text">
                                {{ optional($enquiry->created_at)->format('d M Y, h:i A') }}
                            </p>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $enquiry->email ?: '-' }}
                            </p>

                            <p class="table-sub-text">
                                {{ $enquiry->phone ?: '-' }}
                            </p>
                        </td>

                        <td>
                            {{ $enquiry->subject ?: '-' }}
                        </td>

                        <td>
                            @if($enquiry->status === 'new')
                                <span class="status-pill warning">
                                    New
                                </span>
                            @elseif($enquiry->status === 'read')
                                <span class="status-pill success">
                                    Read
                                </span>
                            @elseif($enquiry->status === 'replied')
                                <span class="status-pill success">
                                    Replied
                                </span>
                            @else
                                <span class="status-pill warning">
                                    {{ ucfirst($enquiry->status) }}
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                <a href="{{ route('admin.enquiries.edit', $enquiry) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Status
                                </a>

                                <form action="{{ route('admin.enquiries.destroy', $enquiry) }}"
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

                @if($enquiries->count() == 0)
                    <tr>
                        <td colspan="6" class="text-center">
                            No enquiry found.
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
    initAdminDataTable('.datatable-Enquiry', {
        searchPlaceholder: 'Search enquiries...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection