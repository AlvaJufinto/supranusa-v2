<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		//
	}

	public function boot(): void
	{
		View::composer('layouts.app', function ($view) {
			$settings = Setting::all()->keyBy('key');
			$navBrands = Brand::with(['products' => fn($q) => $q->active()->ordered()])
				->ordered()
				->get()
				->filter(fn($b) => $b->products->count() > 0);
			$view->with(compact('settings', 'navBrands'));
		});

		Relation::enforceMorphMap([
			'brand' => Brand::class,
			'product' => Product::class,
			'article' => Article::class,
			'project' => Project::class,
		]);
	}
}
