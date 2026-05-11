@extends('layouts.admin')

@section('page-title', 'Edit Website Setting')

@section('content')
@php
    $textFields = ['site_name','email','phone','alternate_phone','whatsapp_number','city','state','pincode','office_time','facebook_link','instagram_link','youtube_link','twitter_link','linkedin_link','footer_tagline','copyright_text','donate_button_text','donate_button_link','volunteer_button_text','volunteer_button_link'];
    $textareaFields = ['address','map_link','map_embed_url','footer_about'];
@endphp
<div class="admin-page-head"><div><a href="{{ route('admin.website-settings.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Edit Website Setting</h2></div></div>
<form method="POST" action="{{ route('admin.website-settings.update', $websiteSetting) }}" enctype="multipart/form-data" class="form-card">
    @csrf @method('PUT')
    <div class="row">
        @foreach(['logo','footer_logo','favicon'] as $field)
            <div class="col-md-4"><div class="field-group"><label>{{ ucwords(str_replace('_',' ',$field)) }}</label><input type="file" name="{{ $field }}" class="form-control">@if($websiteSetting->$field)<p class="table-sub-text mt-2">{{ $websiteSetting->$field }}</p>@endif</div></div>
        @endforeach
        @foreach($textFields as $field)
            <div class="col-md-6"><div class="field-group"><label>{{ ucwords(str_replace('_',' ',$field)) }}</label><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field, $websiteSetting->$field) }}"></div></div>
        @endforeach
        @foreach($textareaFields as $field)
            <div class="col-md-12"><div class="field-group"><label>{{ ucwords(str_replace('_',' ',$field)) }}</label><textarea name="{{ $field }}" class="form-control" rows="3">{{ old($field, $websiteSetting->$field) }}</textarea></div></div>
        @endforeach
        <div class="col-md-6"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1" {{ old('status', $websiteSetting->status) ? 'selected' : '' }}>Active</option><option value="0" {{ !old('status', $websiteSetting->status) ? 'selected' : '' }}>Inactive</option></select></div></div>
    </div>
    <div class="form-actions"><a href="{{ route('admin.website-settings.index') }}" class="btn-outline">Cancel</a><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button></div>
</form>
@endsection
