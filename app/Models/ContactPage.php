<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactPage extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'contact_pages';

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_primary_button_text',
        'hero_secondary_button_text',
        'hero_feature_icon',
        'hero_feature_title',
        'hero_feature_text',
        'hero_card_one_icon',
        'hero_card_one_title',
        'hero_card_two_icon',
        'hero_card_two_title',
        'hero_card_three_icon',
        'hero_card_three_title',
        'hero_card_four_icon',
        'hero_card_four_title',
        'info_badge',
        'info_title',
        'info_description',
        'form_badge',
        'form_title',
        'form_description',
        'support_badge',
        'support_title',
        'support_description',
        'support_person_title',
        'support_person_subtitle',
        'map_badge',
        'map_title',
        'map_description',
        'map_button_text',
        'cta_badge',
        'cta_title',
        'cta_description',
        'cta_primary_button_text',
        'cta_primary_button_link',
        'cta_secondary_button_text',
        'cta_secondary_button_link',
        'status',
    ];

    protected $casts = ['status' => 'boolean'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
