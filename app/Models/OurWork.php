<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurWork extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'our_works';

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_primary_button_text',
        'hero_primary_button_link',
        'hero_secondary_button_text',
        'hero_secondary_button_link',
        'hero_impact_icon',
        'hero_impact_title',
        'hero_impact_text',
        'hero_mini_one_icon',
        'hero_mini_one_title',
        'hero_mini_two_icon',
        'hero_mini_two_title',
        'hero_mini_three_icon',
        'hero_mini_three_title',
        'hero_mini_four_icon',
        'hero_mini_four_title',
        'categories_badge',
        'categories_title',
        'categories_description',
        'details_badge',
        'details_title',
        'initiatives_badge',
        'initiatives_title',
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
