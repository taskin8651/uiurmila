<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeHero extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'home_heroes';

    protected $fillable = [
        'badge_icon',
        'badge_text',
        'title',
        'description',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'image',
        'image_alt',
        'small_card_icon',
        'small_card_title',
        'small_card_text',
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
