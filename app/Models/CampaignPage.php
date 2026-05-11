<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignPage extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'campaign_pages';

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_primary_button_text',
        'hero_primary_button_link',
        'hero_secondary_button_text',
        'hero_secondary_button_link',
        'hero_feature_icon',
        'hero_feature_title',
        'hero_feature_text',
        'hero_mini_one_icon',
        'hero_mini_one_title',
        'hero_mini_two_icon',
        'hero_mini_two_title',
        'hero_mini_three_icon',
        'hero_mini_three_title',
        'hero_mini_four_icon',
        'hero_mini_four_title',
        'events_badge',
        'events_title',
        'events_description',
        'filter_one',
        'filter_two',
        'filter_three',
        'filter_four',
        'filter_five',
        'gallery_badge',
        'gallery_title',
        'gallery_description',
        'gallery_button_text',
        'gallery_button_link',
        'gallery_image_one',
        'gallery_image_two',
        'gallery_image_three',
        'gallery_image_four',
        'cta_badge',
        'cta_title',
        'cta_description',
        'cta_primary_button_text',
        'cta_primary_button_link',
        'cta_secondary_button_text',
        'cta_secondary_button_link',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
