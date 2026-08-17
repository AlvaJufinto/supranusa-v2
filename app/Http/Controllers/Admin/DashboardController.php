<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Media;
use App\Models\Product;
use App\Models\Project;
use App\Models\Brand;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'products' => Product::count(),
            'brands' => Brand::count(),
            'projects' => Project::count(),
            'articles' => Article::count(),
            'media' => Media::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
