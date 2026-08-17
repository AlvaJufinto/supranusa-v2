<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $settings = Setting::all()->keyBy('key');
        $brands = Brand::ordered()->get();
        $productsByBrand = Product::active()->ordered()->with('brand')->get()->groupBy('brand_id');
        $featuredProjects = Project::published()->latest()->limit(4)->get();
        $latestArticles = Article::published()->latest()->limit(3)->get();

        return view('home', compact(
            'settings',
            'brands',
            'productsByBrand',
            'featuredProjects',
            'latestArticles'
        ));
    }
}
