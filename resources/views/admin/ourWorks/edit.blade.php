@extends('layouts.admin')

@section('page-title', 'Edit Our Work Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.our-works.index') }}" class="admin-back-link">&larr; Back To List</a>
        <h2 class="admin-page-title">Edit Our Work Page</h2>
        <p class="admin-page-subtitle">Update frontend Our Work page content</p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar"><i class="fas fa-briefcase"></i></div>
        <div>
            <p class="identity-title">{{ $ourWork->hero_title ?? 'Our Work Page' }}</p>
            <p class="identity-subtitle">ID #{{ $ourWork->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.our-works.update', $ourWork->id) }}">
    @method('PUT')
    @csrf

    @php
        $sections = [
            'Hero Section' => [
                ['hero_badge', 'Hero Badge', 'text', 'fas fa-certificate'],
                ['hero_title', 'Hero Title', 'text', 'fas fa-heading'],
                ['hero_description', 'Hero Description', 'textarea', 'fas fa-align-left'],
                ['hero_primary_button_text', 'Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['hero_primary_button_link', 'Primary Button Link', 'text', 'fas fa-link'],
                ['hero_secondary_button_text', 'Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['hero_secondary_button_link', 'Secondary Button Link', 'text', 'fas fa-link'],
                ['hero_impact_icon', 'Impact Icon', 'text', 'fas fa-icons'],
                ['hero_impact_title', 'Impact Title', 'text', 'fas fa-heading'],
                ['hero_impact_text', 'Impact Text', 'textarea', 'fas fa-align-left'],
            ],
            'Hero Mini Cards' => [
                ['hero_mini_one_icon', 'Mini One Icon', 'text', 'fas fa-icons'],
                ['hero_mini_one_title', 'Mini One Title', 'text', 'fas fa-heading'],
                ['hero_mini_two_icon', 'Mini Two Icon', 'text', 'fas fa-icons'],
                ['hero_mini_two_title', 'Mini Two Title', 'text', 'fas fa-heading'],
                ['hero_mini_three_icon', 'Mini Three Icon', 'text', 'fas fa-icons'],
                ['hero_mini_three_title', 'Mini Three Title', 'text', 'fas fa-heading'],
                ['hero_mini_four_icon', 'Mini Four Icon', 'text', 'fas fa-icons'],
                ['hero_mini_four_title', 'Mini Four Title', 'text', 'fas fa-heading'],
            ],
            'Section Headings' => [
                ['categories_badge', 'Categories Badge', 'text', 'fas fa-certificate'],
                ['categories_title', 'Categories Title', 'text', 'fas fa-heading'],
                ['categories_description', 'Categories Description', 'textarea', 'fas fa-align-left'],
                ['details_badge', 'Details Badge', 'text', 'fas fa-certificate'],
                ['details_title', 'Details Title', 'text', 'fas fa-heading'],
                ['initiatives_badge', 'Initiatives Badge', 'text', 'fas fa-certificate'],
                ['initiatives_title', 'Initiatives Title', 'text', 'fas fa-heading'],
            ],
            'CTA Section' => [
                ['cta_badge', 'CTA Badge', 'text', 'fas fa-certificate'],
                ['cta_title', 'CTA Title', 'text', 'fas fa-heading'],
                ['cta_description', 'CTA Description', 'textarea', 'fas fa-align-left'],
                ['cta_primary_button_text', 'Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['cta_primary_button_link', 'Primary Button Link', 'text', 'fas fa-link'],
                ['cta_secondary_button_text', 'Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['cta_secondary_button_link', 'Secondary Button Link', 'text', 'fas fa-link'],
            ],
        ];
    @endphp

    <div class="admin-form-grid">
        @foreach($sections as $sectionTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon"><i class="fas fa-layer-group"></i></div>
                    <div>
                        <p class="form-card-title">{{ $sectionTitle }}</p>
                        <p class="form-card-subtitle">Manage {{ strtolower($sectionTitle) }} content</p>
                    </div>
                </div>

                <div class="form-card-body">
                    <div class="row">
                        @foreach($fields as $field)
                            @php
                                [$name, $label, $type, $icon] = $field;
                                $value = old($name, $ourWork->$name ?? '');
                                $isTextarea = $type === 'textarea';
                                $col = $isTextarea ? 'col-md-12' : 'col-md-6';
                            @endphp
                            <div class="{{ $col }}">
                                <div class="field-group">
                                    <label class="field-label" for="{{ $name }}">{{ $label }}</label>
                                    @if($isTextarea)
                                        <textarea name="{{ $name }}" id="{{ $name }}" rows="4" class="field-input {{ $errors->has($name) ? 'error' : '' }}" placeholder="Enter {{ strtolower($label) }}">{{ $value }}</textarea>
                                    @else
                                        <div class="input-icon-wrap">
                                            <i class="{{ $icon }} icon"></i>
                                            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" placeholder="Enter {{ strtolower($label) }}" class="field-input {{ $errors->has($name) ? 'error' : '' }}">
                                        </div>
                                    @endif
                                    @if($errors->has($name))
                                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first($name) }}</p>
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
                <div class="form-card-icon"><i class="fas fa-toggle-on"></i></div>
                <div>
                    <p class="form-card-title">Status Settings</p>
                    <p class="form-card-subtitle">Control frontend visibility</p>
                </div>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="status">Status <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>
                        <select name="status" id="status" required class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                            <option value="1" {{ old('status', $ourWork->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $ourWork->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update Our Work Page</button>
        <a href="{{ route('admin.our-works.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
