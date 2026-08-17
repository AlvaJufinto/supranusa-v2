<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function index(Request $request): View
	{
		$query = Product::active()->with('brand');

		if ($request->filled('search')) {
			$search = $request->input('search');
			$query->where(function ($q) use ($search) {
				$q->where('name', 'like', "%{$search}%")
					->orWhere('short_description', 'like', "%{$search}%")
					->orWhere('description', 'like', "%{$search}%");
			});
		}

		if ($request->filled('brand')) {
			$query->where('brand_id', $request->input('brand'));
		}

		$sort = $request->input('sort', 'order');
		match ($sort) {
			'name_asc'  => $query->orderBy('name', 'asc'),
			'name_desc' => $query->orderBy('name', 'desc'),
			'newest'    => $query->orderBy('created_at', 'desc'),
			'oldest'    => $query->orderBy('created_at', 'asc'),
			default     => $query->orderBy('order'),
		};

		$products = $query->get();

		$brands = Brand::ordered()->get();

		return view('products.index', compact('products', 'brands'));
	}

	public function show(Request $request, string $slug): View
	{
		$product = Product::active()
			->where('slug', $slug)
			->with('brand')
			->first();

		if (!$product) {
			$request->session()->flash('error', 'Product not found.');
			return view('products.show', ['product' => null]);
		}

		return view('products.show', compact('product'));
	}
}
