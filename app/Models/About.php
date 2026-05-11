<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'abouts';

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_tag_one',
        'hero_tag_two',
        'hero_tag_three',

        'intro_image',
        'intro_floating_title',
        'intro_floating_text',
        'intro_badge',
        'intro_title',
        'intro_description_one',
        'intro_description_two',
        'stat_one_number',
        'stat_one_title',
        'stat_two_number',
        'stat_two_title',
        'stat_three_number',
        'stat_three_title',
        'intro_point_one',
        'intro_point_two',
        'intro_point_three',

        'story_badge',
        'story_title',
        'story_short_description',
        'story_mini_title',
        'story_mini_text',
        'story_description_one',
        'story_description_two',
        'story_point_one',
        'story_point_two',
        'story_point_three',

        'mission_section_badge',
        'mission_section_title',
        'mission_section_description',
        'mission_title',
        'mission_description',
        'mission_point_one',
        'mission_point_two',
        'vision_title',
        'vision_description',
        'vision_point_one',
        'vision_point_two',

        'values_badge',
        'values_title',
        'values_description',

        'objectives_badge',
        'objectives_title',
        'objectives_description',

        'legal_badge',
        'legal_title',
        'legal_description',
        'legal_organization_name',
        'legal_registration_no',
        'legal_pan_details',
        'legal_registered_address',
        'legal_button_text',
        'legal_button_link',

        'founder_image',
        'founder_photo_badge',
        'founder_badge',
        'founder_title',
        'founder_message',
        'founder_designation',
        'founder_organization',

        'goals_badge',
        'goals_title',
        'goals_description',

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