@extends('layouts.admin')

@section('page-title', 'Add Blog Page')

@section('content')
@php
    $fields = [
        'Hero' => ['hero_badge','hero_title','hero_description','hero_primary_button_text','hero_primary_button_link','hero_secondary_button_text','hero_secondary_button_link','hero_feature_icon','hero_feature_title','hero_feature_text'],
        'Hero Topics' => ['hero_topic_one_icon','hero_topic_one_title','hero_topic_two_icon','hero_topic_two_title','hero_topic_three_icon','hero_topic_three_title','hero_topic_four_icon','hero_topic_four_title'],
        'List & Topics' => ['featured_badge','list_badge','list_title','list_description','filter_one','filter_two','filter_three','filter_four','filter_five','filter_six','topics_badge','topics_title','topics_description'],
        'Newsletter' => ['newsletter_badge','newsletter_title','newsletter_description','newsletter_placeholder','newsletter_button_text'],
        'Detail Page' => ['detail_author_name','detail_author_description','detail_share_title','detail_categories_title','detail_donate_badge','detail_donate_title','detail_donate_description','detail_donate_button_text','detail_donate_button_link','related_badge','related_title','related_description','detail_cta_badge','detail_cta_title','detail_cta_description','detail_cta_primary_button_text','detail_cta_primary_button_link','detail_cta_secondary_button_text','detail_cta_secondary_button_link'],
    ];
    $textarea = ['hero_description','list_description','topics_description','newsletter_description','detail_author_description','detail_donate_description','related_description','detail_cta_description'];
@endphp
<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.blog-pages.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Blog Page</h2>
        <p class="admin-page-subtitle">Create dynamic content for blog and blog detail pages.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.blog-pages.store') }}" class="form-card">
    @csrf
    @foreach($fields as $section => $sectionFields)
        <div class="detail-section-head"><div class="detail-section-icon"><i class="fas fa-newspaper"></i></div><p class="detail-section-title">{{ $section }}</p></div>
        <div class="row">
            @foreach($sectionFields as $field)
                <div class="col-md-6">
                    <div class="field-group">
                        <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                        @if(in_array($field, $textarea))
                            <textarea name="{{ $field }}" class="form-control" rows="3">{{ old($field) }}</textarea>
                        @else
                            <input type="text" name="{{ $field }}" class="form-control" value="{{ old($field) }}">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <div class="field-group">
        <label>Status</label>
        <select name="status" class="form-control"><option value="1" selected>Active</option><option value="0">Inactive</option></select>
    </div>
    <div class="form-actions">
        <a href="{{ route('admin.blog-pages.index') }}" class="btn-outline">Cancel</a>
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save</button>
    </div>
</form>
@endsection
