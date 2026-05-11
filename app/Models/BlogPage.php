<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPage extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'blog_pages';

    protected $fillable = [
        'hero_badge', 'hero_title', 'hero_description',
        'hero_primary_button_text', 'hero_primary_button_link',
        'hero_secondary_button_text', 'hero_secondary_button_link',
        'hero_feature_icon', 'hero_feature_title', 'hero_feature_text',
        'hero_topic_one_icon', 'hero_topic_one_title',
        'hero_topic_two_icon', 'hero_topic_two_title',
        'hero_topic_three_icon', 'hero_topic_three_title',
        'hero_topic_four_icon', 'hero_topic_four_title',
        'featured_badge',
        'list_badge', 'list_title', 'list_description',
        'filter_one', 'filter_two', 'filter_three', 'filter_four', 'filter_five', 'filter_six',
        'topics_badge', 'topics_title', 'topics_description',
        'newsletter_badge', 'newsletter_title', 'newsletter_description',
        'newsletter_placeholder', 'newsletter_button_text',
        'detail_author_name', 'detail_author_description',
        'detail_share_title', 'detail_categories_title',
        'detail_donate_badge', 'detail_donate_title', 'detail_donate_description', 'detail_donate_button_text', 'detail_donate_button_link',
        'related_badge', 'related_title', 'related_description',
        'detail_cta_badge', 'detail_cta_title', 'detail_cta_description',
        'detail_cta_primary_button_text', 'detail_cta_primary_button_link',
        'detail_cta_secondary_button_text', 'detail_cta_secondary_button_link',
        'status',
    ];

    protected $casts = ['status' => 'boolean'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
