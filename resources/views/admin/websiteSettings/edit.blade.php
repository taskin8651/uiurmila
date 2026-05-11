@extends('layouts.admin')

@section('page-title', 'Edit Website Setting')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.website-settings.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Website Setting</h2>

        <p class="admin-page-subtitle">
            {{ $websiteSetting->site_name ?: 'Website Setting' }}
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.website-settings.update', $websiteSetting) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @php
        $sections = [
            'Brand Assets' => [
                ['logo', 'Logo', 'file', 'fas fa-image'],
                ['footer_logo', 'Footer Logo', 'file', 'fas fa-image'],
                ['favicon', 'Favicon', 'file', 'fas fa-star'],
            ],

            'Basic Website Information' => [
                ['site_name', 'Site Name', 'text', 'fas fa-globe'],
                ['email', 'Email', 'text', 'fas fa-envelope'],
                ['phone', 'Phone', 'text', 'fas fa-phone'],
                ['alternate_phone', 'Alternate Phone', 'text', 'fas fa-phone-alt'],
                ['whatsapp_number', 'WhatsApp Number', 'text', 'fab fa-whatsapp'],
                ['office_time', 'Office Time', 'text', 'fas fa-clock'],
            ],

            'Address & Location' => [
                ['address', 'Address', 'textarea', 'fas fa-map-marker-alt'],
                ['city', 'City', 'text', 'fas fa-city'],
                ['state', 'State', 'text', 'fas fa-map'],
                ['pincode', 'Pincode', 'text', 'fas fa-map-pin'],
                ['map_link', 'Map Link', 'textarea', 'fas fa-link'],
                ['map_embed_url', 'Map Embed URL', 'textarea', 'fas fa-map-marked-alt'],
            ],

            'Social Media Links' => [
                ['facebook_link', 'Facebook Link', 'text', 'fab fa-facebook-f'],
                ['instagram_link', 'Instagram Link', 'text', 'fab fa-instagram'],
                ['youtube_link', 'YouTube Link', 'text', 'fab fa-youtube'],
                ['twitter_link', 'Twitter / X Link', 'text', 'fab fa-twitter'],
                ['linkedin_link', 'LinkedIn Link', 'text', 'fab fa-linkedin-in'],
            ],

            'Footer Content' => [
                ['footer_tagline', 'Footer Tagline', 'text', 'fas fa-quote-left'],
                ['footer_about', 'Footer About', 'textarea', 'fas fa-align-left'],
                ['copyright_text', 'Copyright Text', 'text', 'fas fa-copyright'],
            ],

            'CTA Buttons' => [
                ['donate_button_text', 'Donate Button Text', 'text', 'fas fa-heart'],
                ['donate_button_link', 'Donate Button Link', 'text', 'fas fa-link'],
                ['volunteer_button_text', 'Volunteer Button Text', 'text', 'fas fa-hands-helping'],
                ['volunteer_button_link', 'Volunteer Button Link', 'text', 'fas fa-link'],
            ],
        ];
    @endphp

    <div class="admin-form-grid">

        @foreach($sections as $sectionTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <i class="fas fa-cog"></i>
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

                                $value = old($name, $websiteSetting->$name ?? '');

                                $isTextarea = $type === 'textarea';
                                $isFile = $type === 'file';

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

                                    @elseif($isFile)
                                        <div class="input-icon-wrap">
                                            <i class="{{ $icon }} icon"></i>

                                            <input type="file"
                                                   name="{{ $name }}"
                                                   id="{{ $name }}"
                                                   class="field-input {{ $errors->has($name) ? 'error' : '' }}">
                                        </div>

                                        @if(!empty($websiteSetting->$name))
                                            <div class="mt-2">
                                                <p class="table-sub-text mb-2">{{ $websiteSetting->$name }}</p>

                                                <img src="{{ asset('uploads/website/' . $websiteSetting->$name) }}"
                                                     alt="{{ $label }}"
                                                     style="width:110px;height:80px;object-fit:contain;border-radius:12px;border:1px solid #E5E7EB;background:#fff;">
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
                            <option value="1" {{ old('status', $websiteSetting->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $websiteSetting->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
            Update Website Setting
        </button>

        <a href="{{ route('admin.website-settings.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection