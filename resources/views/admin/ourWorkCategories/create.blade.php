@extends('layouts.admin')

@section('page-title', 'Add Program Category')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.our-work-categories.index') }}" class="admin-back-link">&larr; Back To List</a><h2 class="admin-page-title">Add Program Category</h2><p class="admin-page-subtitle">Create a new Our Work focus area card</p></div></div>
<form method="POST" action="{{ route('admin.our-work-categories.store') }}">
    @csrf
    <div class="admin-form-grid">
        <div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-layer-group"></i></div><div><p class="form-card-title">Category Information</p><p class="form-card-subtitle">Add card content and icon</p></div></div><div class="form-card-body">
            @foreach([['icon','Icon Class','bi bi-book-fill'],['title','Title','Education Support'],['meta_one_icon','Meta One Icon','bi bi-people-fill'],['meta_one_text','Meta One Text','Children'],['meta_two_icon','Meta Two Icon','bi bi-graph-up'],['meta_two_text','Meta Two Text','Learning'],['button_text','Button Text','View Program'],['button_link','Button Link','#education']] as $field)
                <div class="field-group"><label class="field-label" for="{{ $field[0] }}">{{ $field[1] }} @if($field[0] === 'title')<span class="req">*</span>@endif</label><div class="input-icon-wrap"><i class="fas fa-pen icon"></i><input type="text" name="{{ $field[0] }}" id="{{ $field[0] }}" value="{{ old($field[0], $field[2]) }}" placeholder="{{ $field[2] }}" class="field-input {{ $errors->has($field[0]) ? 'error' : '' }}" {{ $field[0] === 'title' ? 'required' : '' }}></div>@if($errors->has($field[0]))<p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first($field[0]) }}</p>@endif</div>
            @endforeach
            <div class="field-group"><label class="field-label" for="description">Description</label><textarea name="description" id="description" rows="4" class="field-input {{ $errors->has('description') ? 'error' : '' }}" placeholder="Enter description">{{ old('description') }}</textarea></div>
        </div></div>
        <div class="form-card"><div class="form-card-header"><div class="form-card-icon"><i class="fas fa-cog"></i></div><div><p class="form-card-title">Settings</p><p class="form-card-subtitle">Sorting and visibility</p></div></div><div class="form-card-body">
            <div class="field-group"><label class="field-label" for="sort_order">Sort Order</label><div class="input-icon-wrap"><i class="fas fa-sort-numeric-down icon"></i><input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="field-input"></div></div>
            <div class="field-group"><label class="field-label" for="status">Status</label><div class="input-icon-wrap"><i class="fas fa-toggle-on icon"></i><select name="status" id="status" class="field-input"><option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option><option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option></select></div></div>
        </div></div>
    </div>
    <div class="form-actions"><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save Category</button><a href="{{ route('admin.our-work-categories.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a></div>
</form>
@endsection
