@extends('layouts.admin')

@section('page-title', 'Edit Blog Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-pages.index') }}" class="admin-back-link">
            ← Back To List
        </a>

        <h2 class="admin-page-title">Edit Blog Page</h2>

        <p class="admin-page-subtitle">
            Update dynamic blog page content.
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.blog-pages.update', $blogPage) }}">
    @csrf
    @method('PUT')

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
                ['hero_feature_icon', 'Hero Feature Icon', 'text', 'fas fa-icons'],
                ['hero_feature_title', 'Hero Feature Title', 'text', 'fas fa-star'],
                ['hero_feature_text', 'Hero Feature Text', 'text', 'fas fa-comment'],
            ],

            'Hero Topics Section' => [
                ['hero_topic_one_icon', 'Topic One Icon', 'text', 'fas fa-icons'],
                ['hero_topic_one_title', 'Topic One Title', 'text', 'fas fa-tag'],
                ['hero_topic_two_icon', 'Topic Two Icon', 'text', 'fas fa-icons'],
                ['hero_topic_two_title', 'Topic Two Title', 'text', 'fas fa-tag'],
                ['hero_topic_three_icon', 'Topic Three Icon', 'text', 'fas fa-icons'],
                ['hero_topic_three_title', 'Topic Three Title', 'text', 'fas fa-tag'],
                ['hero_topic_four_icon', 'Topic Four Icon', 'text', 'fas fa-icons'],
                ['hero_topic_four_title', 'Topic Four Title', 'text', 'fas fa-tag'],
            ],

            'Blog List & Topics Section' => [
                ['featured_badge', 'Featured Badge', 'text', 'fas fa-award'],
                ['list_badge', 'List Badge', 'text', 'fas fa-certificate'],
                ['list_title', 'List Title', 'text', 'fas fa-heading'],
                ['list_description', 'List Description', 'textarea', 'fas fa-align-left'],
                ['filter_one', 'Filter One', 'text', 'fas fa-filter'],
                ['filter_two', 'Filter Two', 'text', 'fas fa-filter'],
                ['filter_three', 'Filter Three', 'text', 'fas fa-filter'],
                ['filter_four', 'Filter Four', 'text', 'fas fa-filter'],
                ['filter_five', 'Filter Five', 'text', 'fas fa-filter'],
                ['filter_six', 'Filter Six', 'text', 'fas fa-filter'],
                ['topics_badge', 'Topics Badge', 'text', 'fas fa-tags'],
                ['topics_title', 'Topics Title', 'text', 'fas fa-heading'],
                ['topics_description', 'Topics Description', 'textarea', 'fas fa-align-left'],
            ],

            'Newsletter Section' => [
                ['newsletter_badge', 'Newsletter Badge', 'text', 'fas fa-envelope-open-text'],
                ['newsletter_title', 'Newsletter Title', 'text', 'fas fa-heading'],
                ['newsletter_description', 'Newsletter Description', 'textarea', 'fas fa-align-left'],
                ['newsletter_placeholder', 'Newsletter Placeholder', 'text', 'fas fa-keyboard'],
                ['newsletter_button_text', 'Newsletter Button Text', 'text', 'fas fa-paper-plane'],
            ],

            'Blog Detail Page Section' => [
                ['detail_author_name', 'Author Name', 'text', 'fas fa-user-edit'],
                ['detail_author_description', 'Author Description', 'textarea', 'fas fa-align-left'],
                ['detail_share_title', 'Share Title', 'text', 'fas fa-share-alt'],
                ['detail_categories_title', 'Categories Title', 'text', 'fas fa-folder-open'],
                ['detail_donate_badge', 'Donate Badge', 'text', 'fas fa-heart'],
                ['detail_donate_title', 'Donate Title', 'text', 'fas fa-heading'],
                ['detail_donate_description', 'Donate Description', 'textarea', 'fas fa-align-left'],
                ['detail_donate_button_text', 'Donate Button Text', 'text', 'fas fa-mouse-pointer'],
                ['detail_donate_button_link', 'Donate Button Link', 'text', 'fas fa-link'],
                ['related_badge', 'Related Badge', 'text', 'fas fa-newspaper'],
                ['related_title', 'Related Title', 'text', 'fas fa-heading'],
                ['related_description', 'Related Description', 'textarea', 'fas fa-align-left'],
                ['detail_cta_badge', 'Detail CTA Badge', 'text', 'fas fa-bullhorn'],
                ['detail_cta_title', 'Detail CTA Title', 'text', 'fas fa-heading'],
                ['detail_cta_description', 'Detail CTA Description', 'textarea', 'fas fa-align-left'],
                ['detail_cta_primary_button_text', 'CTA Primary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['detail_cta_primary_button_link', 'CTA Primary Button Link', 'text', 'fas fa-link'],
                ['detail_cta_secondary_button_text', 'CTA Secondary Button Text', 'text', 'fas fa-mouse-pointer'],
                ['detail_cta_secondary_button_link', 'CTA Secondary Button Link', 'text', 'fas fa-link'],
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

                                $value = old($name, $blogPage->$name ?? '');

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
                            <option value="1" {{ old('status', $blogPage->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $blogPage->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
            Update Blog Page
        </button>

        <a href="{{ route('admin.blog-pages.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection