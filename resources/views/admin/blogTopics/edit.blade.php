@extends('layouts.admin')

@section('page-title', 'Edit Blog Topic')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-topics.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Edit Blog Topic</h2></div></div>
<form method="POST" action="{{ route('admin.blog-topics.update',$blogTopic) }}" class="form-card">@csrf @method('PUT')
<div class="row">
@foreach(['icon','title'] as $field)<div class="col-md-6"><div class="field-group"><label>{{ ucfirst($field) }}</label><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field,$blogTopic->$field) }}"></div></div>@endforeach
<div class="col-md-12"><div class="field-group"><label>Description</label><textarea name="description" class="form-control" rows="3">{{ old('description',$blogTopic->description) }}</textarea></div></div>
<div class="col-md-6"><div class="field-group"><label>Sort Order</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',$blogTopic->sort_order) }}"></div></div>
<div class="col-md-6"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1" {{ old('status',$blogTopic->status) ? 'selected' : '' }}>Active</option><option value="0" {{ !old('status',$blogTopic->status) ? 'selected' : '' }}>Inactive</option></select></div></div>
</div><div class="form-actions"><a href="{{ route('admin.blog-topics.index') }}" class="btn-outline">Cancel</a><button class="btn-primary" type="submit"><i class="fas fa-save"></i> Update</button></div></form>
@endsection
