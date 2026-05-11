@extends('layouts.admin')

@section('page-title', 'Donation Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.donations.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Donation Details</h2>
        <p class="admin-page-subtitle">{{ $donation->full_name }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Submitted Data</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full">
            <tbody>
                @foreach([
                    'Full Name' => $donation->full_name,
                    'Mobile Number' => $donation->mobile_number,
                    'Email' => $donation->email,
                    'Amount' => $donation->amount ? 'Rs. ' . $donation->amount : null,
                    'Quick Amount' => $donation->quick_amount ? 'Rs. ' . $donation->quick_amount : null,
                    'Payment Mode' => $donation->payment_mode,
                    'Donation Purpose' => $donation->donation_purpose,
                    'Message' => $donation->message,
                    'Status' => ucfirst($donation->status),
                    'Submitted At' => optional($donation->created_at)->format('d M Y, H:i'),
                ] as $label => $value)
                    <tr>
                        <th>{{ $label }}</th>
                        <td>{{ $value ?: '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
