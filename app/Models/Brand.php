<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Observers\AssetUploadObserver;

class Brand extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'slug', 'description', 'image', 'brand_pdf', 'order'];

	public function products(): HasMany
	{
		return $this->hasMany(Product::class, 'brand_id');
	}

	public function scopeOrdered($query)
	{
		return $query->orderBy('order');
	}

	protected static function booted(): void
	{
		static::observe(AssetUploadObserver::class);
	}
}
