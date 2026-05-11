@extends('layouts.admin')

@section('page-title', 'Edit Blog')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blogs.index') }}" class="admin-back-link">
            ← Back To List
        </a>

        <h2 class="admin-page-title">Edit Blog</h2>

        <p class="admin-page-subtitle">
            {{ $blog->title }}
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @php
        $sections = [
            'Basic Blog Information' => [
                ['title', 'Blog Title', 'text', 'fas fa-heading'],
                ['slug', 'Slug', 'text', 'fas fa-link'],
                ['category', 'Category', 'text', 'fas fa-folder'],
                ['published_date', 'Published Date', 'text', 'fas fa-calendar-alt'],
                ['author', 'Author', 'text', 'fas fa-user-edit'],
                ['image', 'Blog Image', 'file', 'fas fa-image'],
                ['short_description', 'Short Description', 'textarea', 'fas fa-align-left'],
            ],

            'Blog Detail Content' => [
                ['lead_paragraph', 'Lead Paragraph', 'textarea', 'fas fa-paragraph'],
                ['highlight_icon', 'Highlight Icon', 'text', 'fas fa-icons'],
                ['highlight_title', 'Highlight Title', 'text', 'fas fa-star'],
                ['highlight_text', 'Highlight Text', 'textarea', 'fas fa-align-left'],
                ['quote', 'Quote', 'textarea', 'fas fa-quote-left'],
                ['content', 'Full Content', 'textarea-lg', 'fas fa-file-alt'],
            ],

            'SEO & Tags' => [
                ['tags', 'Tags', 'text', 'fas fa-tags'],
            ],
        ];
    @endphp

    <div class="admin-form-grid">

        @foreach($sections as $sectionTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>

                    <div>
                        <p class="form-card-title">{{ $sectionTitle }}</p>
                        <p class="form-card-subtitle">Manage {{ strtolower($sectionTitle) }}</p>
                    </div>
                </div>

                <div class="form-card-body">
                    <div class="row">
                        @foreach($fields as $field)
                            @php
                                [$name, $label, $type, $icon] = $field;

                                $value = old($name, $blog->$name ?? '');

                                $isTextarea = $type === 'textarea';
                                $isTextareaLg = $type === 'textarea-lg';
                                $isFile = $type === 'file';

                                $col = ($isTextarea || $isTextareaLg) ? 'col-md-12' : 'col-md-6';
                                $rows = $isTextareaLg ? 8 : 4;
                            @endphp

                            <div class="{{ $col }}">
                                <div class="field-group">
                                    <label class="field-label" for="{{ $name }}">
                                        {{ $label }}
                                    </label>

                                    @if($isTextarea || $isTextareaLg)
                                        <textarea name="{{ $name }}"
                                                  id="{{ $name }}"
                                                  rows="{{ $rows }}"
                                                  class="field-input {{ $errors->has($name) ? 'error' : '' }}"
                                                  placeholder="Enter {{ strtolower($label) }}">{{ $value }}</textarea>

                                    @elseif($isFile)
                                        <div class="input-icon-wrap">
                                            <i class="{{ $icon }} icon"></i>

                                            <input type="file"
                                                   name="{{ $name }}"
                                                   id="{{ $name }}"
                                                   class="field-input {{ $errors->has($name) ? 'error' : '' }}">
                                        </div>

                                        @if(!empty($blog->$name))
                                            <div class="mt-2">
                                                <p class="table-sub-text mb-2">{{ $blog->$name }}</p>

                                                <img src="{{ asset('uploads/blog/' . $blog->$name) }}"
                                                     alt="{{ $blog->title }}"
                                                     style="width:110px;height:80px;object-fit:cover;border-radius:12px;border:1px solid #E5E7EB;">
                                            </div>
                                        @endif

                                    @else
                                        <div class="input-icon-wrap">
                                            <i class="{{ $icon }} icon"></i>

                                            <input type="{{ $type }}"
                                                   name="{{ $name }}"
                                                   id="{{ $name }}"
                                                   value="{{ $value }}"
                                                   placeholder="Enter {{ strtolower($label) }}"
                                                   class="field-input {{ $errors->has($name) ? 'error' : '' }}">
                                        </div>
                                    @endif

                                    @if($errors->has($name))
                                        <p class="field-error">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $errors->first($name) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-cog"></i>
                </div>

                <div>
                    <p class="form-card-title">Blog Settings</p>
                    <p class="form-card-subtitle">Control featured, sorting and frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="field-group">
                            <label class="field-label" for="is_featured">
                                Featured
                            </label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-star icon"></i>

                                <select name="is_featured"
                                        id="is_featured"
                                        class="field-input {{ $errors->has('is_featured') ? 'error' : '' }}">
                                    <option value="0" {{ old('is_featured', $blog->is_featured) == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('is_featured', $blog->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>

                            @if($errors->has('is_featured'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('is_featured') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
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
                                    <option value="1" {{ old('status', $blog->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $blog->status) == 0 ? 'selected' : '' }}>Inactive</option>
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

                    <div class="col-md-4">
                        <div class="field-group">
                            <label class="field-label" for="sort_order">
                                Sort Order
                            </label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-sort-numeric-down icon"></i>

                                <input type="number"
                                       name="sort_order"
                                       id="sort_order"
                                       value="{{ old('sort_order', $blog->sort_order) }}"
                                       class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}"
                                       placeholder="0">
                            </div>

                            @if($errors->has('sort_order'))
                                <p class="field-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('sort_order') }}
                                </p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Update Blog
        </button>

        <a href="{{ route('admin.blogs.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection