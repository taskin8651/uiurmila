@extends('layouts.admin')

@section('page-title', 'Enquiries')

@section('content')
<div class="admin-page-head"><div><h2 class="admin-page-title">Enquiries</h2><p class="admin-page-subtitle">Messages submitted from the contact page.</p></div></div>
<div class="stats-grid"><div class="stat-card"><p class="stat-label">Total</p><p class="stat-value">{{ $enquiries->count() }}</p></div><div class="stat-card"><p class="stat-label">New</p><p class="stat-value">{{ $enquiries->where('status','new')->count() }}</p></div><div class="stat-card"><p class="stat-label">Read</p><p class="stat-value">{{ $enquiries->where('status','read')->count() }}</p></div><div class="stat-card"><p class="stat-label">Replied</p><p class="stat-value">{{ $enquiries->where('status','replied')->count() }}</p></div></div>
<div class="page-card"><div class="page-card-header"><p class="page-card-title">All Enquiries</p></div><div class="page-card-table"><table class="min-w-full datatable datatable-Enquiry"><thead><tr><th>ID</th><th>Name</th><th>Contact</th><th>Subject</th><th>Status</th><th style="text-align:right;">Actions</th></tr></thead><tbody>
@foreach($enquiries as $enquiry)
<tr><td><span class="id-text">#{{ $enquiry->id }}</span></td><td><p class="table-main-text">{{ $enquiry->name }}</p><p class="table-sub-text">{{ optional($enquiry->created_at)->format('d M Y') }}</p></td><td>{{ $enquiry->email }}<br>{{ $enquiry->phone }}</td><td>{{ $enquiry->subject }}</td><td><span class="status-pill {{ $enquiry->status === 'new' ? 'warning' : 'success' }}">{{ ucfirst($enquiry->status) }}</span></td><td><div class="action-row"><a href="{{ route('admin.enquiries.show',$enquiry) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a><a href="{{ route('admin.enquiries.edit',$enquiry) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Status</a><form action="{{ route('admin.enquiries.destroy',$enquiry) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">@csrf @method('DELETE')<button class="btn-outline btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button></form></div></td></tr>
@endforeach
</tbody></table></div></div>
@endsection
