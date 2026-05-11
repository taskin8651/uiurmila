@extends('layouts.admin')

@section('page-title', 'Edit About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.abouts.index') }}" class="admin-back-link">
            ← Back To List
        </a>

        <h2 class="admin-page-title">Edit About Page</h2>

        <p class="admin-page-subtitle">
            Update frontend About page content
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar">
            <i class="fas fa-info-circle"></i>
        </div>

        <div>
            <p class="identity-title">{{ $about->hero_title ?? 'About Page' }}</p>
            <p class="identity-subtitle">ID #{{ $about->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.abouts.update', $about->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    @php
        $sections = [
            'Hero Section' => [
                ['hero_badge', 'Hero Badge', 'text', 'fas fa-certificate'],
                ['hero_title', 'Hero Title', 'text', 'fas fa-heading'],
                ['hero_description', 'Hero Description', 'textarea', 'fas fa-align-left'],
                ['hero_tag_one', 'Hero Tag One', 'text', 'fas fa-tag'],
                ['hero_tag_two', 'Hero Tag Two', 'text', 'fas fa-tag'],
                ['hero_tag_three', 'Hero Tag Three', 'text', 'fas fa-tag'],
            ],
            'Introduction Section' => [
                ['intro_image', 'Intro Image', 'file', 'fas fa-image'],
                ['intro_floating_title', 'Floating Card Title', 'text', 'fas fa-star'],
                ['intro_floating_text', 'Floating Card Text', 'text', 'fas fa-comment'],
                ['intro_badge', 'Intro Badge', 'text', 'fas fa-certificate'],
                ['intro_title', 'Intro Title', 'text', 'fas fa-heading'],
                ['intro_description_one', 'Intro Description One', 'textarea', 'fas fa-align-left'],
                ['intro_description_two', 'Intro Description Two', 'textarea', 'fas fa-align-left'],
                ['stat_one_number', 'Stat One Number', 'text', 'fas fa-chart-line'],
                ['stat_one_title', 'Stat One Title', 'text', 'fas fa-font'],
                ['stat_two_number', 'Stat Two Number', 'text', 'fas fa-chart-line'],
                ['stat_two_title', 'Stat Two Title', 'text', 'fas fa-font'],
                ['stat_three_number', 'Stat Three Number', 'text', 'fas fa-chart-line'],
                ['stat_three_title', 'Stat Three Title', 'text', 'fas fa-font'],
                ['intro_point_one', 'Intro Point One', 'text', 'fas fa-check-circle'],
                ['intro_point_two', 'Intro Point Two', 'text', 'fas fa-check-circle'],
                ['intro_point_three', 'Intro Point Three', 'text', 'fas fa-check-circle'],
            ],
            'Foundation Story Section' => [
                ['story_badge', 'Story Badge', 'text', 'fas fa-book'],
                ['story_title', 'Story Title', 'text', 'fas fa-heading'],
                ['story_short_description', 'Story Short Description', 'textarea', 'fas fa-align-left'],
                ['story_mini_title', 'Story Mini Title', 'text', 'fas fa-star'],
                ['story_mini_text', 'Story Mini Text', 'text', 'fas fa-comment'],
                ['story_description_one', 'Story Description One', 'textarea', 'fas fa-align-left'],
                ['story_description_two', 'Story Description Two', 'textarea', 'fas fa-align-left'],
                ['story_point_one', 'Story Point One', 'text', 'fas fa-check'],
                ['story_point_two', 'Story Point Two', 'text', 'fas fa-check'],
                ['story_point_three', 'Story Point Three', 'text', 'fas fa-check'],
            ],
            'Mission & Vision Section' => [
                ['mission_section_badge', 'Mission Section Badge', 'text', 'fas fa-certificate'],
                ['mission_section_title', 'Mission Section Title', 'text', 'fas fa-heading'],
                ['mission_section_description', 'Mission Section Description', 'textarea', 'fas fa-align-left'],
                ['mission_title', 'Mission Title', 'text', 'fas fa-bullseye'],
                ['mission_description', 'Mission Description', 'textarea', 'fas fa-align-left'],
                ['mission_point_one', 'Mission Point One', 'text', 'fas fa-check'],
                ['mission_point_two', 'Mission Point Two', 'text', 'fas fa-check'],
                ['vision_title', 'Vision Title', 'text', 'fas fa-eye'],
                ['vision_description', 'Vision Description', 'textarea', 'fas fa-align-left'],
                ['vision_point_one', 'Vision Point One', 'text', 'fas fa-check'],
                ['vision_point_two', 'Vision Point Two', 'text', 'fas fa-check'],
            ],
            'Values / Objectives / Legal / Founder / Goals' => [
                ['values_badge', 'Values Badge', 'text', 'fas fa-gem'],
                ['values_title', 'Values Title', 'text', 'fas fa-heading'],
                ['values_description', 'Values Description', 'textarea', 'fas fa-align-left'],
                ['objectives_badge', 'Objectives Badge', 'text', 'fas fa-list-check'],
                ['objectives_title', 'Objectives Title', 'text', 'fas fa-heading'],
                ['objectives_description', 'Objectives Description', 'textarea', 'fas fa-align-left'],
                ['legal_badge', 'Legal Badge', 'text', 'fas fa-file-contract'],
                ['legal_title', 'Legal Title', 'text', 'fas fa-heading'],
                ['legal_description', 'Legal Description', 'textarea', 'fas fa-align-left'],
                ['legal_organization_name', 'Organization Name', 'text', 'fas fa-building'],
                ['legal_registration_no', 'Registration Number', 'text', 'fas fa-file-alt'],
                ['legal_pan_details', 'PAN / 80G / 12A', 'text', 'fas fa-receipt'],
                ['legal_registered_address', 'Registered Address', 'textarea', 'fas fa-map-marker-alt'],
                ['legal_button_text', 'Legal Button Text', 'text', 'fas fa-link'],
                ['legal_button_link', 'Legal Button Link', 'text', 'fas fa-link'],
                ['founder_image', 'Founder Image', 'file', 'fas fa-image'],
                ['founder_photo_badge', 'Founder Photo Badge', 'text', 'fas fa-award'],
                ['founder_badge', 'Founder Badge', 'text', 'fas fa-certificate'],
                ['founder_title', 'Founder Title', 'text', 'fas fa-heading'],
                ['founder_message', 'Founder Message', 'textarea', 'fas fa-align-left'],
                ['founder_designation', 'Founder Designation', 'text', 'fas fa-user-tie'],
                ['founder_organization', 'Founder Organization', 'text', 'fas fa-building'],
                ['goals_badge', 'Goals Badge', 'text', 'fas fa-flag'],
                ['goals_title', 'Goals Title', 'text', 'fas fa-heading'],
                ['goals_description', 'Goals Description', 'textarea', 'fas fa-align-left'],
            ],
        ];
    @endphp

    <div class="admin-form-grid">
        @foreach($sections as $sectionTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>

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
                                $value = old($name, $about->$name ?? '');
                                $isTextarea = $type === 'textarea';
                                $isFile = $type === 'file';
                                $col = $isTextarea ? 'col-md-12' : 'col-md-6';
                            @endphp

                            <div class="{{ $col }}">
                                <div class="field-group">
                                    <label class="field-label" for="{{ $name }}">{{ $label }}</label>

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

                                        @if(!empty($about->$name))
                                            <div class="mt-2">
                                                <img src="{{ asset('uploads/about/' . $about->$name) }}"
                                                     alt="{{ $label }}"
                                                     style="width:90px;height:70px;object-fit:cover;border-radius:12px;border:1px solid #E5E7EB;">
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
                    <p class="form-card-subtitle">Control frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="status">Status <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>

                        <select name="status"
                                id="status"
                                required
                                class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                            <option value="1" {{ old('status', $about->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $about->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
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
            Update About Page
        </button>

        <a href="{{ route('admin.abouts.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
