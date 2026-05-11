<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryPage extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'gallery_pages';

    protected $fillable = [
        'hero_badge', 'hero_title', 'hero_description',
        'hero_primary_button_text', 'hero_primary_button_link',
        'hero_secondary_button_text', 'hero_secondary_button_link',
        'hero_feature_icon', 'hero_feature_title', 'hero_feature_text',
        'hero_image_one', 'hero_image_two', 'hero_image_three', 'hero_image_four',
        'photos_badge', 'photos_title', 'photos_description',
        'filter_one', 'filter_two', 'filter_three', 'filter_four', 'filter_five', 'filter_six',
        'albums_badge', 'albums_title', 'albums_description',
        'videos_badge', 'videos_title', 'videos_description', 'videos_button_text', 'videos_button_link',
        'cta_badge', 'cta_title', 'cta_description',
        'cta_primary_button_text', 'cta_primary_button_link',
        'cta_secondary_button_text', 'cta_secondary_button_link',
        'status',
    ];

    protected $casts = ['status' => 'boolean'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
