<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VolunteerApplication extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'volunteer_applications';

    protected $fillable = [
        'full_name',
        'mobile_number',
        'email',
        'city',
        'area_of_interest',
        'availability',
        'message',
        'status',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
