@extends('layouts.admin')

@section('page-title', 'Home Hero')

@section('content')

@php
    $defaults = [
        'badge_icon' => 'bi bi-stars',
        'badge_text' => 'For Social Impact',
        'title' => 'Building Hope, Empowering Communities',
        'description' => 'URMILA Development Foundation works for education, healthcare, women empowerment, poverty alleviation, environmental awareness, and community welfare.',
        'primary_button_text' => 'Donate Now',
        'primary_button_link' => route('frontend.donate'),
        'secondary_button_text' => 'Become Volunteer',
        'secondary_button_link' => route('frontend.volunteer'),
        'image_alt' => 'URMILA Development Foundation',
        'small_card_icon' => 'bi bi-heart-pulse-fill',
        'small_card_title' => 'Community Welfare',
        'small_card_text' => 'Serving people with care',
    ];
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Home Hero</h2>
        <p class="admin-page-subtitle">Manage frontend home page hero content from one place.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.home-hero.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-house"></i></div>
                <div>
                    <p class="form-card-title">Hero Content</p>
                    <p class="form-card-subtitle">Badge, heading, description and buttons</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">
                    @php
                        $fields = [
                            ['badge_icon', 'Badge Icon Class', 'text', 'fas fa-icons'],
                            ['badge_text', 'Badge Text', 'text', 'fas fa-certificate'],
                            ['title', 'Hero Title', 'text', 'fas fa-heading'],
                            ['primary_button_text', 'Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                            ['primary_button_link', 'Primary Button Link', 'text', 'fas fa-link'],
                            ['secondary_button_text', 'Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                            ['secondary_button_link', 'Secondary Button Link', 'text', 'fas fa-link'],
                        ];
                    @endphp

                    @foreach($fields as $field)
                        @php [$name, $label, $type, $icon] = $field; @endphp
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label" for="{{ $name }}">{{ $label }}</label>
                                <div class="input-icon-wrap">
                                    <i class="{{ $icon }} icon"></i>
                                    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $homeHero->$name ?? $defaults[$name] ?? '') }}" class="field-input {{ $errors->has($name) ? 'error' : '' }}" placeholder="Enter {{ strtolower($label) }}">
                                </div>
                                @if($errors->has($name))
                                    <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first($name) }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <div class="field-group">
                            <label class="field-label" for="description">Hero Description</label>
                            <textarea name="description" id="description" rows="4" class="field-input {{ $errors->has('description') ? 'error' : '' }}" placeholder="Enter hero description">{{ old('description', $homeHero->description ?? $defaults['description']) }}</textarea>
                            @if($errors->has('description'))
                                <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('description') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-image"></i></div>
                <div>
                    <p class="form-card-title">Hero Image And Card</p>
                    <p class="form-card-subtitle">Right image, floating card and visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="image">Hero Image</label>
                            <input type="file" name="image" id="image" class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                            @if($homeHero && $homeHero->image)
                                <p class="field-help">Current: {{ $homeHero->image }}</p>
                            @endif
                            @if($errors->has('image'))
                                <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('image') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="image_alt">Image Alt Text</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-align-left icon"></i>
                                <input type="text" name="image_alt" id="image_alt" value="{{ old('image_alt', $homeHero->image_alt ?? $defaults['image_alt']) }}" class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}" placeholder="Enter image alt text">
                            </div>
                        </div>
                    </div>

                    @foreach([
                        ['small_card_icon', 'Small Card Icon', 'fas fa-icons'],
                        ['small_card_title', 'Small Card Title', 'fas fa-heading'],
                        ['small_card_text', 'Small Card Text', 'fas fa-comment'],
                    ] as $field)
                        @php [$name, $label, $icon] = $field; @endphp
                        <div class="col-md-6">
                            <div class="field-group">
                                <label class="field-label" for="{{ $name }}">{{ $label }}</label>
                                <div class="input-icon-wrap">
                                    <i class="{{ $icon }} icon"></i>
                                    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $homeHero->$name ?? $defaults[$name] ?? '') }}" class="field-input {{ $errors->has($name) ? 'error' : '' }}" placeholder="Enter {{ strtolower($label) }}">
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="status">Status <span class="req">*</span></label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-toggle-on icon"></i>
                                <select name="status" id="status" required class="field-input {{ $errors->has('status') ? 'error' : '' }}">
                                    <option value="1" {{ old('status', $homeHero->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $homeHero->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Hero
        </button>
    </div>
</form>

@endsection
