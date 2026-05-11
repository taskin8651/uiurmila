@extends('layouts.admin')

@section('page-title', 'Blog Sidebar Categories')

@section('content')
<div class="admin-page-head"><div><h2 class="admin-page-title">Blog Sidebar Categories</h2><p class="admin-page-subtitle">Manage categories shown in blog detail sidebar.</p></div><a href="{{ route('admin.blog-sidebar-categories.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Category</a></div>
<div class="page-card"><div class="page-card-header"><p class="page-card-title">All Sidebar Categories</p></div><div class="page-card-table"><table class="min-w-full datatable datatable-BlogSidebarCategory"><thead><tr><th>ID</th><th>Title</th><th>Count</th><th>Status</th><th style="text-align:right;">Actions</th></tr></thead><tbody>
@foreach($blogSidebarCategories as $blogSidebarCategory)
<tr><td><span class="id-text">#{{ $blogSidebarCategory->id }}</span></td><td><p class="table-main-text">{{ $blogSidebarCategory->title }}</p><p class="table-sub-text">{{ $blogSidebarCategory->link }}</p></td><td>{{ $blogSidebarCategory->count }}</td><td><span class="status-pill {{ $blogSidebarCategory->status ? 'success' : 'warning' }}">{{ $blogSidebarCategory->status ? 'Active' : 'Inactive' }}</span></td><td><div class="action-row"><a href="{{ route('admin.blog-sidebar-categories.show',$blogSidebarCategory) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a><a href="{{ route('admin.blog-sidebar-categories.edit',$blogSidebarCategory) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a><form action="{{ route('admin.blog-sidebar-categories.destroy',$blogSidebarCategory) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">@csrf @method('DELETE')<button class="btn-outline btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button></form></div></td></tr>
@endforeach
</tbody></table></div></div>
@endsection
