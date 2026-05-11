<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'donations';

    protected $fillable = [
        'full_name',
        'mobile_number',
        'email',
        'amount',
        'quick_amount',
        'payment_mode',
        'donation_purpose',
        'message',
        'status',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
