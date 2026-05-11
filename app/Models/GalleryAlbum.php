<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryAlbum extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'gallery_albums';

    protected $fillable = [
        'cover_image', 'photo_count', 'album_date', 'title', 'description',
        'button_text', 'button_link', 'sort_order', 'status',
    ];

    protected $casts = ['status' => 'boolean'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
