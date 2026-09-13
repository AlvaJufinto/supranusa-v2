<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Observers\AssetUploadObserver;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id', 'name', 'slug', 'short_description',
        'description', 'image', 'file', 'order', 'status'
    ];

    protected $casts = ['status' => 'string'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function scopeActive($query)
    {
        return $query->whereRaw('LOWER(status) = ?', ['active']);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getShortLabel(): string
    {
        $name = $this->name;
        if (str_starts_with($name, 'Series ')) {
            $parts = explode(' ', $name);
            return implode(' ', array_slice($parts, 0, 2));
        }
        return explode(' ', $name)[0];
    }

    protected static function booted(): void
    {
        static::observe(AssetUploadObserver::class);
    }
}
