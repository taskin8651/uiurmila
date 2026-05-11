@extends('layouts.admin')

@section('page-title', 'Add Donate Page')

@section('content')

@include('admin.donatePages.form', [
    'donatePage' => null,
    'title' => 'Add Donate Page',
    'subtitle' => 'Create dynamic donation page, form, and payment details.',
    'action' => route('admin.donate-pages.store'),
    'method' => 'POST',
    'buttonText' => 'Save Donate Page',
])

@endsection
