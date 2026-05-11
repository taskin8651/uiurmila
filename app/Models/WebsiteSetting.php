<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsiteSetting extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'website_settings';

    protected $fillable = [
        'site_name',
        'logo',
        'footer_logo',
        'favicon',
        'email',
        'phone',
        'alternate_phone',
        'whatsapp_number',
        'address',
        'city',
        'state',
        'pincode',
        'map_link',
        'map_embed_url',
        'office_time',
        'facebook_link',
        'instagram_link',
        'youtube_link',
        'twitter_link',
        'linkedin_link',
        'footer_about',
        'footer_tagline',
        'copyright_text',
        'donate_button_text',
        'donate_button_link',
        'volunteer_button_text',
        'volunteer_button_link',
        'status',
    ];

    protected $casts = ['status' => 'boolean'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
