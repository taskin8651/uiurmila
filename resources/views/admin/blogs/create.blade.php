@extends('layouts.admin')

@section('page-title', 'Add Blog')

@section('content')
<div class="admin-page-head">
    <div><a href="{{ route('admin.blogs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Add Blog</h2><p class="admin-page-subtitle">Create a blog article and its detail page content.</p></div>
</div>

<form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf
    <div class="row">
        @foreach(['title','slug','category','published_date','author','highlight_icon','highlight_title','tags'] as $field)
            <div class="col-md-6"><div class="field-group"><label>{{ ucwords(str_replace('_', ' ', $field)) }}</label><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field) }}"></div></div>
        @endforeach
        <div class="col-md-6"><div class="field-group"><label>Image</label><input type="file" name="image" class="form-control"></div></div>
        <div class="col-md-3"><div class="field-group"><label>Featured</label><select name="is_featured" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></div></div>
        <div class="col-md-3"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1">Active</option><option value="0">Inactive</option></select></div></div>
        <div class="col-md-3"><div class="field-group"><label>Sort Order</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}"></div></div>
        @foreach(['short_description','lead_paragraph','highlight_text','quote','content'] as $field)
            <div class="col-md-12"><div class="field-group"><label>{{ ucwords(str_replace('_', ' ', $field)) }}</label><textarea name="{{ $field }}" class="form-control" rows="{{ $field === 'content' ? 8 : 3 }}">{{ old($field) }}</textarea></div></div>
        @endforeach
    </div>
    <div class="form-actions"><a href="{{ route('admin.blogs.index') }}" class="btn-outline">Cancel</a><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save</button></div>
</form>
@endsection
