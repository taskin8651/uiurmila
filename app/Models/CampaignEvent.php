<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignEvent extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'campaign_events';

    protected $fillable = [
        'image',
        'status_label',
        'status_class',
        'category',
        'event_date',
        'location',
        'title',
        'description',
        'gallery_image_one',
        'gallery_image_two',
        'gallery_image_three',
        'gallery_more_count',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'sort_order',
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
