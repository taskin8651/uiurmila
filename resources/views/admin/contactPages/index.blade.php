@extends('layouts.admin')

@section('page-title', 'Contact Page')

@section('content')
<div class="admin-page-head"><div><h2 class="admin-page-title">Contact Page</h2><p class="admin-page-subtitle">Manage dynamic contact page section content.</p></div><a href="{{ route('admin.contact-pages.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Contact Page</a></div>
<div class="page-card"><div class="page-card-header"><p class="page-card-title">All Contact Page Records</p></div><div class="page-card-table"><table class="min-w-full datatable datatable-ContactPage"><thead><tr><th>ID</th><th>Hero</th><th>Form Title</th><th>Status</th><th style="text-align:right;">Actions</th></tr></thead><tbody>
@foreach($contactPages as $contactPage)
<tr><td><span class="id-text">#{{ $contactPage->id }}</span></td><td><p class="table-main-text">{{ $contactPage->hero_title }}</p><p class="table-sub-text">{{ $contactPage->hero_badge }}</p></td><td>{{ $contactPage->form_title }}</td><td><span class="status-pill {{ $contactPage->status ? 'success' : 'warning' }}">{{ $contactPage->status ? 'Active' : 'Inactive' }}</span></td><td><div class="action-row"><a href="{{ route('admin.contact-pages.show',$contactPage) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a><a href="{{ route('admin.contact-pages.edit',$contactPage) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a><form action="{{ route('admin.contact-pages.destroy',$contactPage) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">@csrf @method('DELETE')<button class="btn-outline btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button></form></div></td></tr>
@endforeach
</tbody></table></div></div>
@endsection
