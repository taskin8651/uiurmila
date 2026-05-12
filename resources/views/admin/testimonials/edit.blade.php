@extends('layouts.admin')

@section('page-title', 'Edit Testimonial')

@section('content')

@include('admin.testimonials.form', [
    'testimonial' => $testimonial,
    'title' => 'Edit Testimonial',
    'subtitle' => $testimonial->name ?: 'Testimonial',
    'action' => route('admin.testimonials.update', $testimonial),
    'method' => 'PUT',
    'buttonText' => 'Update Testimonial',
])

@endsection
