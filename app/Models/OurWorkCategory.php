<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurWorkCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'our_work_categories';

    protected $fillable = [
        'icon',
        'title',
        'description',
        'meta_one_icon',
        'meta_one_text',
        'meta_two_icon',
        'meta_two_text',
        'button_text',
        'button_link',
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
