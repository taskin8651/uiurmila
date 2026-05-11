@extends('layouts.admin')

@section('page-title', 'Update Enquiry')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.enquiries.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Update Enquiry Status</h2><p class="admin-page-subtitle">{{ $enquiry->name }}</p></div></div>
<form method="POST" action="{{ route('admin.enquiries.update',$enquiry) }}" class="form-card">@csrf @method('PUT')
<div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>New</option><option value="read" {{ $enquiry->status === 'read' ? 'selected' : '' }}>Read</option><option value="replied" {{ $enquiry->status === 'replied' ? 'selected' : '' }}>Replied</option></select></div>
<div class="form-actions"><a href="{{ route('admin.enquiries.index') }}" class="btn-outline">Cancel</a><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button></div>
</form>
@endsection
