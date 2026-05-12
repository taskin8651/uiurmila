@extends('layouts.admin')

@section('page-title', 'Add Testimonial')

@section('content')

@include('admin.testimonials.form', [
    'testimonial' => null,
    'title' => 'Add Testimonial',
    'subtitle' => 'Create a new impact story testimonial',
    'action' => route('admin.testimonials.store'),
    'method' => 'POST',
    'buttonText' => 'Save Testimonial',
])

@endsection
