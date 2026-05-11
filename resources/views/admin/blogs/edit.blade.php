@extends('layouts.admin')

@section('page-title', 'Edit Blog')

@section('content')
<div class="admin-page-head">
    <div><a href="{{ route('admin.blogs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a><h2 class="admin-page-title">Edit Blog</h2><p class="admin-page-subtitle">{{ $blog->title }}</p></div>
</div>

<form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data" class="form-card">
    @csrf @method('PUT')
    <div class="row">
        @foreach(['title','slug','category','published_date','author','highlight_icon','highlight_title','tags'] as $field)
            <div class="col-md-6"><div class="field-group"><label>{{ ucwords(str_replace('_', ' ', $field)) }}</label><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field, $blog->$field) }}"></div></div>
        @endforeach
        <div class="col-md-6"><div class="field-group"><label>Image</label><input type="file" name="image" class="form-control">@if($blog->image)<p class="table-sub-text mt-2">{{ $blog->image }}</p>@endif</div></div>
        <div class="col-md-3"><div class="field-group"><label>Featured</label><select name="is_featured" class="form-control"><option value="0" {{ !old('is_featured', $blog->is_featured) ? 'selected' : '' }}>No</option><option value="1" {{ old('is_featured', $blog->is_featured) ? 'selected' : '' }}>Yes</option></select></div></div>
        <div class="col-md-3"><div class="field-group"><label>Status</label><select name="status" class="form-control"><option value="1" {{ old('status', $blog->status) ? 'selected' : '' }}>Active</option><option value="0" {{ !old('status', $blog->status) ? 'selected' : '' }}>Inactive</option></select></div></div>
        <div class="col-md-3"><div class="field-group"><label>Sort Order</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $blog->sort_order) }}"></div></div>
        @foreach(['short_description','lead_paragraph','highlight_text','quote','content'] as $field)
            <div class="col-md-12"><div class="field-group"><label>{{ ucwords(str_replace('_', ' ', $field)) }}</label><textarea name="{{ $field }}" class="form-control" rows="{{ $field === 'content' ? 8 : 3 }}">{{ old($field, $blog->$field) }}</textarea></div></div>
        @endforeach
    </div>
    <div class="form-actions"><a href="{{ route('admin.blogs.index') }}" class="btn-outline">Cancel</a><button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button></div>
</form>
@endsection
