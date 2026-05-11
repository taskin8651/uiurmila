@extends('layouts.admin')

@section('page-title', 'Edit FAQ')

@section('content')

@include('admin.faqs.form', [
    'faq' => $faq,
    'title' => 'Edit FAQ',
    'subtitle' => $faq->question,
    'action' => route('admin.faqs.update', $faq),
    'method' => 'PUT',
    'buttonText' => 'Update FAQ',
])

@endsection
