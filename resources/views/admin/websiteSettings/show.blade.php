@extends('layouts.admin')

@section('page-title', 'Website Setting Details')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.website-settings.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">{{ $websiteSetting->site_name ?: 'Website Setting' }}</h2><p class="admin-page-subtitle">{{ $websiteSetting->footer_tagline }}</p></div><div class="show-actions"><a href="{{ route('admin.website-settings.edit', $websiteSetting) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></div></div>
<div class="detail-card"><div class="detail-section-body">
@foreach(['email','phone','alternate_phone','whatsapp_number','address','city','state','pincode','office_time','map_link','facebook_link','instagram_link','youtube_link','twitter_link','linkedin_link','donate_button_link','volunteer_button_link'] as $field)
<div class="detail-row"><span class="detail-label">{{ ucwords(str_replace('_',' ',$field)) }}</span><span class="detail-value">{{ $websiteSetting->$field ?: '-' }}</span></div>
@endforeach
<div class="detail-row"><span class="detail-label">Status</span><span class="status-pill {{ $websiteSetting->status ? 'success' : 'warning' }}">{{ $websiteSetting->status ? 'Active' : 'Inactive' }}</span></div>
</div></div>
@endsection
