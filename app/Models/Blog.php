<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'blogs';

    protected $fillable = [
        'image', 'category', 'published_date', 'author', 'title', 'slug',
        'short_description', 'lead_paragraph', 'content', 'highlight_icon',
        'highlight_title', 'highlight_text', 'quote', 'tags',
        'is_featured', 'sort_order', 'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
