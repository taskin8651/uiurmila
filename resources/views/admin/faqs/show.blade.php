@extends('layouts.admin')

@section('page-title', 'FAQ Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">FAQ Details</h2>
        <p class="admin-page-subtitle">{{ $faq->question }}</p>
    </div>

    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn-primary">
        <i class="fas fa-pencil-alt"></i>
        Edit FAQ
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Question And Answer</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>#{{ $faq->id }}</td>
                </tr>
                <tr>
                    <th>Question</th>
                    <td>{{ $faq->question }}</td>
                </tr>
                <tr>
                    <th>Answer</th>
                    <td>{{ $faq->answer }}</td>
                </tr>
                <tr>
                    <th>Sort Order</th>
                    <td>{{ $faq->sort_order ?? 0 }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $faq->status ? 'Active' : 'Inactive' }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ optional($faq->created_at)->format('d M Y, H:i') ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
