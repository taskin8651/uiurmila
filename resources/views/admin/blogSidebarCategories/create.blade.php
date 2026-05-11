@extends('layouts.admin')

@section('page-title', 'Add Sidebar Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-sidebar-categories.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Sidebar Category</h2>

        <p class="admin-page-subtitle">
            Create a category item for blog detail sidebar.
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.blog-sidebar-categories.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-folder-open"></i>
                </div>

                <div>
                    <p class="form-card-title">Category Information</p>
                    <p class="form-card-subtitle">
                        Manage title, count and link for sidebar category
                    </p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">

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
                                       placeholder="Enter category title"
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

                    <div class="col-md-3">
                        <div class="field-group">
                            <label class="field-label" for="count">
                                Count
                            </label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-hashtag icon"></i>

                                <input type="text"
                                       name="count"
                                       id="count"
                                       value="{{ old('count', 0) }}"
                                       placeholder="0"
                                       class="field-input {{ $errors->has('count') ? 'error' : '' }}">
                            </div>

                            @if($errors->has('count'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('count') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
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
                    </div>

                    <div class="col-md-12">
                        <div class="field-group">
                            <label class="field-label" for="link">
                                Link
                            </label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>

                                <input type="text"
                                       name="link"
                                       id="link"
                                       value="{{ old('link', '#') }}"
                                       placeholder="/blog?category=education"
                                       class="field-input {{ $errors->has('link') ? 'error' : '' }}">
                            </div>

                            @if($errors->has('link'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('link') }}
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
                    <i class="fas fa-toggle-on"></i>
                </div>

                <div>
                    <p class="form-card-title">Status Settings</p>
                    <p class="form-card-subtitle">
                        Control sidebar category visibility
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
            Save Category
        </button>

        <a href="{{ route('admin.blog-sidebar-categories.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection