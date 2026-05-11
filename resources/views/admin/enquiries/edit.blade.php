@extends('layouts.admin')

@section('page-title', 'Update Enquiry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.enquiries.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Update Enquiry Status</h2>

        <p class="admin-page-subtitle">
            {{ $enquiry->name ?: 'Website Enquiry' }}
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>

                <div>
                    <p class="form-card-title">Enquiry Information</p>
                    <p class="form-card-subtitle">
                        Review visitor message before updating status
                    </p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Name</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-user icon"></i>

                                <input type="text"
                                       value="{{ $enquiry->name ?: '-' }}"
                                       class="field-input"
                                       readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Email</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-envelope icon"></i>

                                <input type="text"
                                       value="{{ $enquiry->email ?: '-' }}"
                                       class="field-input"
                                       readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Phone</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-phone icon"></i>

                                <input type="text"
                                       value="{{ $enquiry->phone ?: '-' }}"
                                       class="field-input"
                                       readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Subject</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>

                                <input type="text"
                                       value="{{ $enquiry->subject ?: '-' }}"
                                       class="field-input"
                                       readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="field-group">
                            <label class="field-label">Message</label>

                            <textarea rows="5"
                                      class="field-input"
                                      readonly>{{ $enquiry->message ?: '-' }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-toggle-on"></i>
                </div>

                <div>
                    <p class="form-card-title">Status Settings</p>
                    <p class="form-card-subtitle">
                        Update enquiry response status
                    </p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="status">
                        Status <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>

                        <select name="status"
                                id="status"
                                required
                                class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                            <option value="new" {{ old('status', $enquiry->status) === 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ old('status', $enquiry->status) === 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ old('status', $enquiry->status) === 'replied' ? 'selected' : '' }}>Replied</option>
                        </select>
                    </div>

                    @if($errors->has('status'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Update Status
        </button>

        <a href="{{ route('admin.enquiries.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection