@extends('layouts.admin')

@section('page-title', 'Donate Page Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.donate-pages.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Donate Page Details</h2>
        <p class="admin-page-subtitle">{{ $donatePage->hero_title ?: 'Donation Page Content' }}</p>
    </div>

    <a href="{{ route('admin.donate-pages.edit', $donatePage) }}" class="btn-primary">
        <i class="fas fa-pencil-alt"></i>
        Edit Donate Page
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Content Summary</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full">
            <tbody>
                @foreach([
                    'Hero Title' => $donatePage->hero_title,
                    'Hero Badge' => $donatePage->hero_badge,
                    'Form Title' => $donatePage->form_title,
                    'Quick Amounts' => $donatePage->quick_amounts,
                    'Payment Modes' => $donatePage->payment_modes,
                    'Donation Purposes' => $donatePage->donation_purposes,
                    'Payment Title' => $donatePage->payment_title,
                    'Account Name' => $donatePage->account_name,
                    'Bank Name' => $donatePage->bank_name,
                    'Account Number' => $donatePage->account_number,
                    'IFSC / UPI ID' => $donatePage->ifsc_upi,
                    'Support Phone' => $donatePage->support_phone,
                    'Support Email' => $donatePage->support_email,
                ] as $label => $value)
                    <tr>
                        <th>{{ $label }}</th>
                        <td>{{ $value ?: '-' }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>Status</th>
                    <td>{{ $donatePage->status ? 'Active' : 'Inactive' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
