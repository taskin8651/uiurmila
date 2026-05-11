@extends('layouts.admin')

@section('page-title', 'Add Blog Topic')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-topics.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Add Blog Topic</h2></div></div>
<form method="POST" action="{{ route('admin.blog-topics.store') }}" class="form-card">@csrf
<div class="row">
@foreach(['icon','title'] as $field)<div class="col-md-6"><div class="field-group"><label>{{ ucfirst($field) }}</label><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field) }}"></div></div>@endforeach
<div class="col-md-12"><div class="field-group"><label>Description</label><textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea></div></div>
<div class="col-md-6"><div class="field-group"><label>Sort Order</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',0) }}"></div></div>
<div class="col-md-6"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1">Active</option><option value="0">Inactive</option></select></div></div>
</div><div class="form-actions"><a href="{{ route('admin.blog-topics.index') }}" class="btn-outline">Cancel</a><button class="btn-primary" type="submit"><i class="fas fa-save"></i> Save</button></div></form>
@endsection
