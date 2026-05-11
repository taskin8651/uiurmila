@extends('layouts.admin')

@section('page-title', 'Update Volunteer Application')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.volunteer-applications.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Update Volunteer Status</h2>
        <p class="admin-page-subtitle">{{ $volunteerApplication->full_name ?: 'Volunteer Application' }}</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.volunteer-applications.update', $volunteerApplication) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-hands-helping"></i></div>
                <div>
                    <p class="form-card-title">Application Information</p>
                    <p class="form-card-subtitle">Review volunteer details before updating status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">
                    @foreach([
                        'Name' => $volunteerApplication->full_name,
                        'Email' => $volunteerApplication->email,
                        'Mobile' => $volunteerApplication->mobile_number,
                        'City / Location' => $volunteerApplication->city,
                        'Area of Interest' => $volunteerApplication->area_of_interest,
                        'Availability' => $volunteerApplication->availability,
                    ] as $label => $value)
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label">{{ $label }}</label>
                                <div class="input-icon-wrap">
                                    <i class="fas fa-user icon"></i>
                                    <input type="text" value="{{ $value ?: '-' }}" class="field-input" readonly>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <div class="field-group">
                            <label class="field-label">Message</label>
                            <textarea rows="5" class="field-input" readonly>{{ $volunteerApplication->message ?: '-' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-toggle-on"></i></div>
                <div>
                    <p class="form-card-title">Status Settings</p>
                    <p class="form-card-subtitle">Update volunteer response status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="status">Status <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>
                        <select name="status" id="status" required class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                            <option value="new" {{ old('status', $volunteerApplication->status) === 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ old('status', $volunteerApplication->status) === 'read' ? 'selected' : '' }}>Read</option>
                            <option value="contacted" {{ old('status', $volunteerApplication->status) === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="approved" {{ old('status', $volunteerApplication->status) === 'approved' ? 'selected' : '' }}>Approved</option>
                        </select>
                    </div>

                    @if($errors->has('status'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('status') }}</p>
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

        <a href="{{ route('admin.volunteer-applications.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
