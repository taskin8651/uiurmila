@extends('layouts.admin')

@section('page-title', 'Donations')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Donations</h2>
        <p class="admin-page-subtitle">Submitted donation form details from the frontend.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Donations</p>
        <p class="stat-value">{{ $donations->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">New</p>
        <p class="stat-value">{{ $donations->where('status', 'new')->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Total Amount</p>
        <p class="stat-value">{{ $donations->sum('amount') }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Latest</p>
        <p class="stat-value">#{{ optional($donations->first())->id ?? 0 }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Donation Submissions</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Donation">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donor</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <td><span class="id-text">#{{ $donation->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $donation->full_name }}</p>
                            <p class="table-sub-text">{{ $donation->mobile_number ?: $donation->email }}</p>
                        </td>
                        <td>{{ $donation->amount ? 'Rs. ' . $donation->amount : '-' }}</td>
                        <td>{{ $donation->payment_mode ?: '-' }}</td>
                        <td>{{ $donation->donation_purpose ?: '-' }}</td>
                        <td><span class="status-pill success">{{ ucfirst($donation->status) }}</span></td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.donations.show', $donation) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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

                @if($donations->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">No donation submission found.</td>
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
    initAdminDataTable('.datatable-Donation', {
        searchPlaceholder: 'Search donation...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ records'
    });
});
</script>
@endsection
