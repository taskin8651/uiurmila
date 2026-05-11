<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurWorkDetail extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'our_work_details';

    protected $fillable = [
        'section_id',
        'image',
        'label',
        'title',
        'description',
        'beneficiaries_label',
        'beneficiaries_text',
        'impact_label',
        'impact_text',
        'button_text',
        'button_link',
        'is_reverse',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'is_reverse' => 'boolean',
        'status' => 'boolean',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
