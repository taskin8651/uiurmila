@extends('layouts.admin')

@section('page-title', 'Enquiry Details')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.enquiries.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">{{ $enquiry->subject ?: 'Enquiry' }}</h2><p class="admin-page-subtitle">Submitted by {{ $enquiry->name }}</p></div><div class="show-actions"><a href="{{ route('admin.enquiries.edit',$enquiry) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Update Status</a></div></div>
<div class="show-grid"><div class="detail-card"><div class="detail-section-body">
@foreach(['name','email','phone','subject','status'] as $field)<div class="detail-row"><span class="detail-label">{{ ucfirst($field) }}</span><span class="detail-value">{{ $enquiry->$field ?: '-' }}</span></div>@endforeach
</div></div><div class="detail-card detail-card-pad"><p class="quick-title">Message</p><p>{{ $enquiry->message ?: '-' }}</p></div></div>
@endsection
