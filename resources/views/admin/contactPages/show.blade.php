@extends('layouts.admin')

@section('page-title', 'Contact Page Details')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.contact-pages.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">{{ $contactPage->hero_title ?: 'Contact Page' }}</h2><p class="admin-page-subtitle">{{ $contactPage->hero_description }}</p></div><div class="show-actions"><a href="{{ route('admin.contact-pages.edit',$contactPage) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></div></div>
<div class="detail-card"><div class="detail-section-body">
@foreach(['hero_badge','info_title','form_title','support_title','map_title','cta_title'] as $field)
<div class="detail-row"><span class="detail-label">{{ ucwords(str_replace('_',' ',$field)) }}</span><span class="detail-value">{{ $contactPage->$field ?: '-' }}</span></div>
@endforeach
<div class="detail-row"><span class="detail-label">Status</span><span class="status-pill {{ $contactPage->status ? 'success' : 'warning' }}">{{ $contactPage->status ? 'Active' : 'Inactive' }}</span></div>
</div></div>
@endsection
