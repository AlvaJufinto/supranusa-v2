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

		    // BAC grouped products for the special 3-column dropdown
		    $bacBrand = Brand::where('slug', 'bac')->first();
		    $bacGroupedProducts = null;
		    if ($bacBrand) {
		        $bacProducts = $bacBrand->products()
		            ->active()
		            ->ordered()
		            ->get()
		            ->groupBy('bac_category');

		        $categoryLabels = [
		            'closed_circuit_cooling_tower' => 'CLOSED CIRCUIT COOLING TOWERS',
		            'cooling_tower' => 'COOLING TOWERS',
		            'evaporative_condenser' => 'EVAPORATIVE CONDENSERS',
		        ];

		        $bacGroupedProducts = $bacProducts->map(function ($group, $category) use ($categoryLabels) {
		            return [
		                'category' => $category,
		                'heading' => $categoryLabels[$category] ?? strtoupper(str_replace('_', ' ', $category)),
		                'products' => $group,
		            ];
		        });
		    }

		    $view->with(compact('settings', 'navBrands', 'bacGroupedProducts'));
		});

		Relation::enforceMorphMap([
			'brand' => Brand::class,
			'product' => Product::class,
			'article' => Article::class,
			'project' => Project::class,
		]);
	}
}
