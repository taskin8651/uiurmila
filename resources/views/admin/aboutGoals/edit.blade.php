@extends('layouts.admin')

@section('page-title', 'Edit Goal')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-goals.index') }}" class="admin-back-link">← Back To List</a>
        <h2 class="admin-page-title">Edit Goal</h2>
        <p class="admin-page-subtitle">Update long-term goal</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-goals.update', $aboutGoal->id) }}">
    @method('PUT')
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-flag"></i>
                </div>

                <div>
                    <p class="form-card-title">Goal Information</p>
                    <p class="form-card-subtitle">Update goal card content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="number">Number</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-hashtag icon"></i>
                        <input type="text" name="number" id="number"
                               value="{{ old('number', $aboutGoal->number) }}"
                               placeholder="01"
                               class="field-input {{ $errors->has('number') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" id="icon"
                               value="{{ old('icon', $aboutGoal->icon ?? 'bi bi-people-fill') }}"
                               placeholder="bi bi-people-fill"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title"
                               value="{{ old('title', $aboutGoal->title) }}"
                               required
                               placeholder="Expand Community Programs"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                              placeholder="Enter description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $aboutGoal->description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-link"></i>
                </div>

                <div>
                    <p class="form-card-title">Button & Settings</p>
                    <p class="form-card-subtitle">CTA link, sorting and visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="button_text">Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text" name="button_text" id="button_text"
                               value="{{ old('button_text', $aboutGoal->button_text) }}"
                               placeholder="Explore Work"
                               class="field-input {{ $errors->has('button_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_link">Button Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="button_link" id="button_link"
                               value="{{ old('button_link', $aboutGoal->button_link) }}"
                               placeholder="/programs"
                               class="field-input {{ $errors->has('button_link') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order"
                               value="{{ old('sort_order', $aboutGoal->sort_order ?? 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status">Status</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>
                        <select name="status" id="status" class="field-input">
                            <option value="1" {{ old('status', $aboutGoal->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $aboutGoal->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Update Goal
        </button>

        <a href="{{ route('admin.about-goals.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
