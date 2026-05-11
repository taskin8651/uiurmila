@extends('layouts.admin')

@section('page-title', 'Edit Contact Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-pages.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Contact Page</h2>

        <p class="admin-page-subtitle">
            {{ $contactPage->hero_title ?: 'Contact Page Content' }}
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.contact-pages.update', $contactPage) }}">
    @csrf
    @method('PUT')

    @php
        $sections = [
            'Hero Section' => [
                ['hero_badge', 'Hero Badge', 'text', 'fas fa-certificate'],
                ['hero_title', 'Hero Title', 'text', 'fas fa-heading'],
                ['hero_description', 'Hero Description', 'textarea', 'fas fa-align-left'],
                ['hero_primary_button_text', 'Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['hero_secondary_button_text', 'Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['hero_feature_icon', 'Feature Icon', 'text', 'fas fa-icons'],
                ['hero_feature_title', 'Feature Title', 'text', 'fas fa-star'],
                ['hero_feature_text', 'Feature Text', 'textarea', 'fas fa-comment'],
            ],

            'Hero Contact Cards' => [
                ['hero_card_one_icon', 'Card One Icon', 'text', 'fas fa-icons'],
                ['hero_card_one_title', 'Card One Title', 'text', 'fas fa-heading'],
                ['hero_card_two_icon', 'Card Two Icon', 'text', 'fas fa-icons'],
                ['hero_card_two_title', 'Card Two Title', 'text', 'fas fa-heading'],
                ['hero_card_three_icon', 'Card Three Icon', 'text', 'fas fa-icons'],
                ['hero_card_three_title', 'Card Three Title', 'text', 'fas fa-heading'],
                ['hero_card_four_icon', 'Card Four Icon', 'text', 'fas fa-icons'],
                ['hero_card_four_title', 'Card Four Title', 'text', 'fas fa-heading'],
            ],

            'Contact Info Section' => [
                ['info_badge', 'Info Badge', 'text', 'fas fa-certificate'],
                ['info_title', 'Info Title', 'text', 'fas fa-heading'],
                ['info_description', 'Info Description', 'textarea', 'fas fa-align-left'],
            ],

            'Contact Form Section' => [
                ['form_badge', 'Form Badge', 'text', 'fas fa-certificate'],
                ['form_title', 'Form Title', 'text', 'fas fa-heading'],
                ['form_description', 'Form Description', 'textarea', 'fas fa-align-left'],
            ],

            'Support Section' => [
                ['support_badge', 'Support Badge', 'text', 'fas fa-headset'],
                ['support_title', 'Support Title', 'text', 'fas fa-heading'],
                ['support_description', 'Support Description', 'textarea', 'fas fa-align-left'],
                ['support_person_title', 'Support Person Title', 'text', 'fas fa-user'],
                ['support_person_subtitle', 'Support Person Subtitle', 'text', 'fas fa-user-tag'],
            ],

            'Map Section' => [
                ['map_badge', 'Map Badge', 'text', 'fas fa-map-marker-alt'],
                ['map_title', 'Map Title', 'text', 'fas fa-heading'],
                ['map_description', 'Map Description', 'textarea', 'fas fa-align-left'],
                ['map_button_text', 'Map Button Text', 'text', 'fas fa-location-arrow'],
            ],

            'CTA Section' => [
                ['cta_badge', 'CTA Badge', 'text', 'fas fa-bullhorn'],
                ['cta_title', 'CTA Title', 'text', 'fas fa-heading'],
                ['cta_description', 'CTA Description', 'textarea', 'fas fa-align-left'],
                ['cta_primary_button_text', 'CTA Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['cta_primary_button_link', 'CTA Primary Button Link', 'text', 'fas fa-link'],
                ['cta_secondary_button_text', 'CTA Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['cta_secondary_button_link', 'CTA Secondary Button Link', 'text', 'fas fa-link'],
            ],
        ];
    @endphp

    <div class="admin-form-grid">

        @foreach($sections as $sectionTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <i class="fas fa-address-book"></i>
                    </div>

                    <div>
                        <p class="form-card-title">{{ $sectionTitle }}</p>
                        <p class="form-card-subtitle">
                            Manage {{ strtolower($sectionTitle) }} content
                        </p>
                    </div>
                </div>

                <div class="form-card-body">
                    <div class="row">
                        @foreach($fields as $field)
                            @php
                                [$name, $label, $type, $icon] = $field;

                                $value = old($name, $contactPage->$name ?? '');

                                $isTextarea = $type === 'textarea';
                                $col = $isTextarea ? 'col-md-12' : 'col-md-6';
                            @endphp

                            <div class="{{ $col }}">
                                <div class="field-group">
                                    <label class="field-label" for="{{ $name }}">
                                        {{ $label }}
                                    </label>

                                    @if($isTextarea)
                                        <textarea name="{{ $name }}"
                                                  id="{{ $name }}"
                                                  rows="4"
                                                  class="field-input {{ $errors->has($name) ? 'error' : '' }}"
                                                  placeholder="Enter {{ strtolower($label) }}">{{ $value }}</textarea>
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
                    <i class="fas fa-toggle-on"></i>
                </div>

                <div>
                    <p class="form-card-title">Status Settings</p>
                    <p class="form-card-subtitle">
                        Control frontend visibility
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
                            <option value="1" {{ old('status', $contactPage->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $contactPage->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
            Update Contact Page
        </button>

        <a href="{{ route('admin.contact-pages.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection