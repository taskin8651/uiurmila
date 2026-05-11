@extends('layouts.admin')

@section('page-title', 'Edit Contact Page')

@section('content')
@php
$fields = ['hero_badge','hero_title','hero_description','hero_primary_button_text','hero_secondary_button_text','hero_feature_icon','hero_feature_title','hero_feature_text','hero_card_one_icon','hero_card_one_title','hero_card_two_icon','hero_card_two_title','hero_card_three_icon','hero_card_three_title','hero_card_four_icon','hero_card_four_title','info_badge','info_title','info_description','form_badge','form_title','form_description','support_badge','support_title','support_description','support_person_title','support_person_subtitle','map_badge','map_title','map_description','map_button_text','cta_badge','cta_title','cta_description','cta_primary_button_text','cta_primary_button_link','cta_secondary_button_text','cta_secondary_button_link'];
$textarea = ['hero_description','hero_feature_text','info_description','form_description','support_description','map_description','cta_description'];
@endphp
<div class="admin-page-head"><div><a href="{{ route('admin.contact-pages.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Edit Contact Page</h2></div></div>
<form method="POST" action="{{ route('admin.contact-pages.update',$contactPage) }}" class="form-card">@csrf @method('PUT')
<div class="row">
@foreach($fields as $field)
<div class="col-md-6"><div class="field-group"><label>{{ ucwords(str_replace('_',' ',$field)) }}</label>@if(in_array($field,$textarea))<textarea name="{{ $field }}" class="form-control" rows="3">{{ old($field,$contactPage->$field) }}</textarea>@else<input type="text" name="{{ $field }}" class="form-control" value="{{ old($field,$contactPage->$field) }}">@endif</div></div>
@endforeach
<div class="col-md-6"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1" {{ old('status',$contactPage->status) ? 'selected' : '' }}>Active</option><option value="0" {{ !old('status',$contactPage->status) ? 'selected' : '' }}>Inactive</option></select></div></div>
</div><div class="form-actions"><a href="{{ route('admin.contact-pages.index') }}" class="btn-outline">Cancel</a><button class="btn-primary" type="submit"><i class="fas fa-save"></i> Update</button></div></form>
@endsection
