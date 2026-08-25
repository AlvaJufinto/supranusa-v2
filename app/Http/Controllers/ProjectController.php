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
		$query = Project::published()->with('brand');

		if ($request->filled('brand')) {
			$query->where('brand_id', $request->brand);
		}

		$projects = $query->latest()->get();

		$brands = Brand::ordered()
			->whereHas('projects', fn($q) => $q->where('status', 'published'))
			->get();

		return view('projects.index', compact('projects', 'brands'));
	}
}
