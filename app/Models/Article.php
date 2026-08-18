<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Observers\AssetUploadObserver;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'thumbnail', 'excerpt', 'content',
        'status', 'published_at', 'meta_title', 'meta_description',
        'meta_keywords', 'og_image'
    ];

    protected $casts = ['published_at' => 'datetime'];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    protected static function booted(): void
    {
        static::observe(AssetUploadObserver::class);
    }
}
