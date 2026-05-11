@extends('layouts.admin')

@section('page-title', 'Add Initiative')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.our-work-initiatives.index') }}" class="admin-back-link">&larr; Back To List</a><h2 class="admin-page-title">Add Initiative</h2><p class="admin-page-subtitle">Create an additional community program card</p></div></div>
<form method="POST" action="{{ route('admin.our-work-initiatives.store') }}">
    @csrf
    <div class="admin-form-grid"><div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-plus-circle"></i></div><div><p class="form-card-title">Initiative Information</p><p class="form-card-subtitle">Add title, icon and description</p></div></div><div class="form-card-body">
        <div class="field-group"><label class="field-label" for="icon">Icon Class</label><div class="input-icon-wrap"><i class="fas fa-icons icon"></i><input type="text" name="icon" id="icon" value="{{ old('icon', 'bi bi-cash-coin') }}" class="field-input"></div></div>
        <div class="field-group"><label class="field-label" for="title">Title <span class="req">*</span></label><div class="input-icon-wrap"><i class="fas fa-heading icon"></i><input type="text" name="title" id="title" value="{{ old('title') }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}"></div>@if($errors->has('title'))<p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>@endif</div>
        <div class="field-group"><label class="field-label" for="description">Description</label><textarea name="description" id="description" rows="4" class="field-input">{{ old('description') }}</textarea></div>
    </div></div><div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-cog"></i></div><div><p class="form-card-title">Settings</p><p class="form-card-subtitle">Sorting and visibility</p></div></div><div class="form-card-body"><div class="field-group"><label class="field-label" for="sort_order">Sort Order</label><div class="input-icon-wrap"><i class="fas fa-sort-numeric-down icon"></i><input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="field-input"></div></div><div class="field-group"><label class="field-label" for="status">Status</label><div class="input-icon-wrap"><i class="fas fa-toggle-on icon"></i><select name="status" id="status" class="field-input"><option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option><option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option></select></div></div></div></div></div>
    <div class="form-actions"><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save Initiative</button><a href="{{ route('admin.our-work-initiatives.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a></div>
</form>
@endsection
