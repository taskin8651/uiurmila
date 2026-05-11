<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogSidebarCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'blog_sidebar_categories';

    protected $fillable = ['title', 'count', 'link', 'sort_order', 'status'];
    protected $casts = ['status' => 'boolean'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
