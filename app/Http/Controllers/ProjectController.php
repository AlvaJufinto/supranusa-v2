<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Project;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function index(Request $request): View
	{
		$selectedBrand = ($request->filled('brand') ? Brand::find($request->brand) : null)
			?? Brand::where('slug', 'siemens')->first();

		$query = Project::published()->with('brand');

		if ($selectedBrand) {
			$query->where('brand_id', $selectedBrand->id);
		}

		$projects = $query->latest()->get();

		$brands = Brand::ordered()
			->whereHas('projects', fn($q) => $q->where('status', 'published'))
			->get();

		return view('projects.index', compact('projects', 'brands', 'selectedBrand'));
	}
}
