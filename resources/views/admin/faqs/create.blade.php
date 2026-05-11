@extends('layouts.admin')

@section('page-title', 'Add FAQ')

@section('content')

@include('admin.faqs.form', [
    'faq' => null,
    'title' => 'Add FAQ',
    'subtitle' => 'Create a new question and answer for frontend FAQ page.',
    'action' => route('admin.faqs.store'),
    'method' => 'POST',
    'buttonText' => 'Save FAQ',
])

@endsection
