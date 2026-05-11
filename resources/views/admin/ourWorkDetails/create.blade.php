@extends('layouts.admin')

@section('page-title', 'Add Program Detail')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.our-work-details.index') }}" class="admin-back-link">&larr; Back To List</a><h2 class="admin-page-title">Add Program Detail</h2><p class="admin-page-subtitle">Create a detailed program block</p></div></div>
<form method="POST" action="{{ route('admin.our-work-details.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="admin-form-grid">
        <div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-list-check"></i></div><div><p class="form-card-title">Program Information</p><p class="form-card-subtitle">Add image, labels and content</p></div></div><div class="form-card-body">
            @foreach([['section_id','Section ID','education'],['label','Label','Education Support'],['title','Title','Helping Children Learn and Grow'],['beneficiaries_label','Beneficiaries Label','Beneficiaries'],['beneficiaries_text','Beneficiaries Text','Children, students, families'],['impact_label','Impact Label','Impact'],['impact_text','Impact Text','Better learning access'],['button_text','Button Text','Support This Cause'],['button_link','Button Link','/donate']] as $field)
                <div class="field-group"><label class="field-label" for="{{ $field[0] }}">{{ $field[1] }} @if($field[0] === 'title')<span class="req">*</span>@endif</label><div class="input-icon-wrap"><i class="fas fa-pen icon"></i><input type="text" name="{{ $field[0] }}" id="{{ $field[0] }}" value="{{ old($field[0], $field[2]) }}" placeholder="{{ $field[2] }}" class="field-input {{ $errors->has($field[0]) ? 'error' : '' }}" {{ $field[0] === 'title' ? 'required' : '' }}></div>@if($errors->has($field[0]))<p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first($field[0]) }}</p>@endif</div>
            @endforeach
            <div class="field-group"><label class="field-label" for="description">Description</label><textarea name="description" id="description" rows="4" class="field-input {{ $errors->has('description') ? 'error' : '' }}" placeholder="Enter description">{{ old('description') }}</textarea></div>
            <div class="field-group"><label class="field-label" for="image">Image</label><div class="input-icon-wrap"><i class="fas fa-image icon"></i><input type="file" name="image" id="image" class="field-input {{ $errors->has('image') ? 'error' : '' }}"></div></div>
        </div></div>
        <div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-cog"></i></div><div><p class="form-card-title">Settings</p><p class="form-card-subtitle">Layout, sorting and visibility</p></div></div><div class="form-card-body">
            <div class="field-group"><label class="field-label" for="is_reverse">Reverse Layout</label><div class="input-icon-wrap"><i class="fas fa-exchange-alt icon"></i><select name="is_reverse" id="is_reverse" class="field-input"><option value="0" {{ old('is_reverse', 0) == 0 ? 'selected' : '' }}>No</option><option value="1" {{ old('is_reverse', 0) == 1 ? 'selected' : '' }}>Yes</option></select></div></div>
            <div class="field-group"><label class="field-label" for="sort_order">Sort Order</label><div class="input-icon-wrap"><i class="fas fa-sort-numeric-down icon"></i><input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="field-input"></div></div>
            <div class="field-group"><label class="field-label" for="status">Status</label><div class="input-icon-wrap"><i class="fas fa-toggle-on icon"></i><select name="status" id="status" class="field-input"><option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option><option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option></select></div></div>
        </div></div>
    </div>
    <div class="form-actions"><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save Detail</button><a href="{{ route('admin.our-work-details.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a></div>
</form>
@endsection
