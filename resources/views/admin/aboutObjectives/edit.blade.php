@extends('layouts.admin')

@section('page-title', 'Edit Objective')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-objectives.index') }}" class="admin-back-link">← Back To List</a>
        <h2 class="admin-page-title">Edit Objective</h2>
        <p class="admin-page-subtitle">Update About page objective</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-objectives.update', $aboutObjective->id) }}">
    @method('PUT')
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Objective Information</p>
                    <p class="form-card-subtitle">Update objective text and icon</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="icon">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" id="icon"
                               value="{{ old('icon', $aboutObjective->icon ?? 'bi bi-check2-circle') }}"
                               placeholder="bi bi-check2-circle"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Objective <span class="req">*</span></label>
                    <textarea name="title" id="title" rows="5"
                              required
                              placeholder="Enter objective"
                              class="field-input {{ $errors->has('title') ? 'error' : '' }}">{{ old('title', $aboutObjective->title) }}</textarea>

                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-cog"></i>
                </div>

                <div>
                    <p class="form-card-title">Settings</p>
                    <p class="form-card-subtitle">Sorting and visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order"
                               value="{{ old('sort_order', $aboutObjective->sort_order ?? 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status">Status</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>
                        <select name="status" id="status" class="field-input">
                            <option value="1" {{ old('status', $aboutObjective->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $aboutObjective->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Update Objective
        </button>

        <a href="{{ route('admin.about-objectives.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
