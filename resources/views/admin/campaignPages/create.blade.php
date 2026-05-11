@extends('layouts.admin')

@section('page-title', 'Add Campaign Page')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.campaign-pages.index') }}" class="admin-back-link">&larr; Back To List</a><h2 class="admin-page-title">Add Campaign Page</h2><p class="admin-page-subtitle">Fill frontend Campaigns page content</p></div></div>
<form method="POST" action="{{ route('admin.campaign-pages.store') }}">
    @csrf
    @php
        $campaignPage = null;
        $sections = [
            'Hero Section' => [
                ['hero_badge','Hero Badge','text','fas fa-certificate'],['hero_title','Hero Title','text','fas fa-heading'],['hero_description','Hero Description','textarea','fas fa-align-left'],
                ['hero_primary_button_text','Primary Button Text','text','fas fa-mouse-pointer'],['hero_primary_button_link','Primary Button Link','text','fas fa-link'],['hero_secondary_button_text','Secondary Button Text','text','fas fa-mouse-pointer'],['hero_secondary_button_link','Secondary Button Link','text','fas fa-link'],
                ['hero_feature_icon','Feature Icon','text','fas fa-icons'],['hero_feature_title','Feature Title','text','fas fa-heading'],['hero_feature_text','Feature Text','textarea','fas fa-align-left'],
            ],
            'Hero Mini Cards' => [
                ['hero_mini_one_icon','Mini One Icon','text','fas fa-icons'],['hero_mini_one_title','Mini One Title','text','fas fa-heading'],['hero_mini_two_icon','Mini Two Icon','text','fas fa-icons'],['hero_mini_two_title','Mini Two Title','text','fas fa-heading'],['hero_mini_three_icon','Mini Three Icon','text','fas fa-icons'],['hero_mini_three_title','Mini Three Title','text','fas fa-heading'],['hero_mini_four_icon','Mini Four Icon','text','fas fa-icons'],['hero_mini_four_title','Mini Four Title','text','fas fa-heading'],
            ],
            'Events & Filters' => [
                ['events_badge','Events Badge','text','fas fa-certificate'],['events_title','Events Title','text','fas fa-heading'],['events_description','Events Description','textarea','fas fa-align-left'],['filter_one','Filter One','text','fas fa-filter'],['filter_two','Filter Two','text','fas fa-filter'],['filter_three','Filter Three','text','fas fa-filter'],['filter_four','Filter Four','text','fas fa-filter'],['filter_five','Filter Five','text','fas fa-filter'],
            ],
            'Gallery Strip' => [
                ['gallery_badge','Gallery Badge','text','fas fa-certificate'],['gallery_title','Gallery Title','text','fas fa-heading'],['gallery_description','Gallery Description','textarea','fas fa-align-left'],['gallery_button_text','Gallery Button Text','text','fas fa-mouse-pointer'],['gallery_button_link','Gallery Button Link','text','fas fa-link'],['gallery_image_one','Gallery Image One Path','text','fas fa-image'],['gallery_image_two','Gallery Image Two Path','text','fas fa-image'],['gallery_image_three','Gallery Image Three Path','text','fas fa-image'],['gallery_image_four','Gallery Image Four Path','text','fas fa-image'],
            ],
            'CTA Section' => [
                ['cta_badge','CTA Badge','text','fas fa-certificate'],['cta_title','CTA Title','text','fas fa-heading'],['cta_description','CTA Description','textarea','fas fa-align-left'],['cta_primary_button_text','Primary Button Text','text','fas fa-mouse-pointer'],['cta_primary_button_link','Primary Button Link','text','fas fa-link'],['cta_secondary_button_text','Secondary Button Text','text','fas fa-mouse-pointer'],['cta_secondary_button_link','Secondary Button Link','text','fas fa-link'],
            ],
        ];
    @endphp
    <div class="admin-form-grid">@foreach($sections as $sectionTitle => $fields)<div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-layer-group"></i></div><div><p class="form-card-title">{{ $sectionTitle }}</p><p class="form-card-subtitle">Manage {{ strtolower($sectionTitle) }} content</p></div></div><div class="form-card-body"><div class="row">@foreach($fields as $field)@php [$name,$label,$type,$icon] = $field; $value = old($name, $campaignPage->$name ?? ''); $isTextarea = $type === 'textarea'; $col = $isTextarea ? 'col-md-12' : 'col-md-6'; @endphp<div class="{{ $col }}"><div class="field-group"><label class="field-label" for="{{ $name }}">{{ $label }}</label>@if($isTextarea)<textarea name="{{ $name }}" id="{{ $name }}" rows="4" class="field-input {{ $errors->has($name) ? 'error' : '' }}" placeholder="Enter {{ strtolower($label) }}">{{ $value }}</textarea>@else<div class="input-icon-wrap"><i class="{{ $icon }} icon"></i><input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" placeholder="Enter {{ strtolower($label) }}" class="field-input {{ $errors->has($name) ? 'error' : '' }}"></div>@endif @if($errors->has($name))<p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first($name) }}</p>@endif</div></div>@endforeach</div></div></div>@endforeach<div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-toggle-on"></i></div><div><p class="form-card-title">Status Settings</p><p class="form-card-subtitle">Control frontend visibility</p></div></div><div class="form-card-body"><div class="field-group"><label class="field-label" for="status">Status <span class="req">*</span></label><div class="input-icon-wrap"><i class="fas fa-toggle-on icon"></i><select name="status" id="status" required class="field-input"><option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option><option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option></select></div></div></div></div></div>
    <div class="form-actions"><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save Campaign Page</button><a href="{{ route('admin.campaign-pages.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a></div>
</form>
@endsection
