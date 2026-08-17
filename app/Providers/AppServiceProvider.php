<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Setting;
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
			$navBrands = Brand::with(['products' => fn($q) => $q->active()->ordered()->limit(10)])
				->ordered()
				->get();
			$view->with(compact('settings', 'navBrands'));
		});
	}
}
