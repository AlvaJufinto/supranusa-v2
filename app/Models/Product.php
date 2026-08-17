<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
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
}
