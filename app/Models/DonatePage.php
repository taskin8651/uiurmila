<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonatePage extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'donate_pages';

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
        'why_badge',
        'why_title',
        'why_description',
        'form_badge',
        'form_title',
        'form_description',
        'quick_amounts',
        'payment_modes',
        'donation_purposes',
        'form_button_text',
        'form_success_message',
        'payment_badge',
        'payment_title',
        'payment_description',
        'qr_image',
        'account_name',
        'bank_name',
        'account_number',
        'ifsc_upi',
        'tax_badge',
        'tax_title',
        'tax_description',
        'tax_point_one',
        'tax_point_two',
        'support_badge',
        'support_title',
        'support_description',
        'support_phone',
        'support_email',
        'cta_badge',
        'cta_title',
        'cta_description',
        'cta_primary_button_text',
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
