@extends('layouts.admin')

@section('page-title', 'Add Blog Topic')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-topics.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Blog Topic</h2>

        <p class="admin-page-subtitle">
            Create a topic card for blog page.
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.blog-topics.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tags"></i>
                </div>

                <div>
                    <p class="form-card-title">Topic Information</p>
                    <p class="form-card-subtitle">
                        Manage topic icon, title and description
                    </p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="icon">
                                Icon
                            </label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>

                                <input type="text"
                                       name="icon"
                                       id="icon"
                                       value="{{ old('icon') }}"
                                       placeholder="bi bi-heart-fill"
                                       class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                            </div>

                            @if($errors->has('icon'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('icon') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="title">
                                Title <span class="req">*</span>
                            </label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>

                                <input type="text"
                                       name="title"
                                       id="title"
                                       value="{{ old('title') }}"
                                       placeholder="Enter topic title"
                                       class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                            </div>

                            @if($errors->has('title'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="field-group">
                            <label class="field-label" for="description">
                                Description
                            </label>

                            <textarea name="description"
                                      id="description"
                                      rows="4"
                                      placeholder="Enter topic description"
                                      class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                            @if($errors->has('description'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                        </div>
                    </div>

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
                    <p class="form-card-subtitle">
                        Control sorting and frontend visibility
                    </p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               placeholder="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

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
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option>
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
            Save Topic
        </button>

        <a href="{{ route('admin.blog-topics.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection