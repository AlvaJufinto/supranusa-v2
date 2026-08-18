<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Observers\AssetUploadObserver;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'title', 'slug', 'brand', 'year', 'company',
        'description', 'thumbnail', 'tags', 'status'
    ];

    protected $casts = [
        'tags' => 'array',
        'year' => 'integer',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function scopeByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    protected static function booted(): void
    {
        static::observe(AssetUploadObserver::class);
    }
}
