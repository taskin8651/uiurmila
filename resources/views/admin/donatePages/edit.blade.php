@extends('layouts.admin')

@section('page-title', 'Edit Donate Page')

@section('content')

@include('admin.donatePages.form', [
    'donatePage' => $donatePage,
    'title' => 'Edit Donate Page',
    'subtitle' => $donatePage->hero_title ?: 'Donation Page Content',
    'action' => route('admin.donate-pages.update', $donatePage),
    'method' => 'PUT',
    'buttonText' => 'Update Donate Page',
])

@endsection
