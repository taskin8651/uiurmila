@extends('layouts.admin')

@section('page-title', 'Blog Topics')

@section('content')
<div class="admin-page-head"><div><h2 class="admin-page-title">Blog Topics</h2><p class="admin-page-subtitle">Manage topic cards shown on blog page.</p></div><a href="{{ route('admin.blog-topics.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Topic</a></div>
<div class="page-card"><div class="page-card-header"><p class="page-card-title">All Topics</p></div><div class="page-card-table"><table class="min-w-full datatable datatable-BlogTopic"><thead><tr><th>ID</th><th>Title</th><th>Icon</th><th>Status</th><th style="text-align:right;">Actions</th></tr></thead><tbody>
@foreach($blogTopics as $blogTopic)
<tr><td><span class="id-text">#{{ $blogTopic->id }}</span></td><td><p class="table-main-text">{{ $blogTopic->title }}</p><p class="table-sub-text">{{ $blogTopic->description }}</p></td><td>{{ $blogTopic->icon }}</td><td><span class="status-pill {{ $blogTopic->status ? 'success' : 'warning' }}">{{ $blogTopic->status ? 'Active' : 'Inactive' }}</span></td><td><div class="action-row"><a href="{{ route('admin.blog-topics.show',$blogTopic) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a><a href="{{ route('admin.blog-topics.edit',$blogTopic) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a><form action="{{ route('admin.blog-topics.destroy',$blogTopic) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">@csrf @method('DELETE')<button class="btn-outline btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button></form></div></td></tr>
@endforeach
</tbody></table></div></div>
@endsection
