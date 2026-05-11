@extends('layouts.admin')

@section('page-title', 'Add Sidebar Category')

@section('content')
<div class="admin-page-head"><div><a href="{{ route('admin.blog-sidebar-categories.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Add Sidebar Category</h2></div></div>
<form method="POST" action="{{ route('admin.blog-sidebar-categories.store') }}" class="form-card">@csrf
<div class="row">
<div class="col-md-6"><div class="field-group"><label>Title</label><input type="text" name="title" class="form-control" value="{{ old('title') }}"></div></div>
<div class="col-md-3"><div class="field-group"><label>Count</label><input type="text" name="count" class="form-control" value="{{ old('count',0) }}"></div></div>
<div class="col-md-3"><div class="field-group"><label>Sort Order</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',0) }}"></div></div>
<div class="col-md-6"><div class="field-group"><label>Link</label><input type="text" name="link" class="form-control" value="{{ old('link','#') }}"></div></div>
<div class="col-md-6"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1">Active</option><option value="0">Inactive</option></select></div></div>
</div><div class="form-actions"><a href="{{ route('admin.blog-sidebar-categories.index') }}" class="btn-outline">Cancel</a><button class="btn-primary" type="submit"><i class="fas fa-save"></i> Save</button></div></form>
@endsection
