<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Observers\AssetUploadObserver;
use App\Services\AssetServer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
	public function index(): View
	{
		$products = Product::with('brand')->ordered()->get();
		return view('admin.products.index', compact('products'));
	}

	public function create(): View
	{
		$brands = Brand::ordered()->get();
		return view('admin.products.create', compact('brands'));
	}

	public function store(Request $request, AssetServer $assetServer): RedirectResponse
	{
		$data = $request->validate([
			'brand_id' => 'required|exists:brands,id',
			'name' => 'required|string|max:255',
			'short_description' => 'nullable|string',
			'description' => 'nullable|string',
			'image_file' => 'nullable|image|max:51200',
			'file' => 'nullable|file|max:204800',
			'order' => 'nullable|integer',
			'status' => 'required|in:active,inactive',
		]);

		$data['slug'] = Str::slug($data['name']);

		$pendingUploads = [];
		if ($request->hasFile('image_file')) {
			$upload = $assetServer->upload($request->file('image_file'));
			$data['image'] = $upload['url'];
			$pendingUploads['image'] = $upload;
		}

		if ($request->hasFile('file')) {
			$upload = $assetServer->upload($request->file('file'));
			$data['file'] = $upload['url'];
			$pendingUploads['file'] = $upload;
		}

		$product = new Product($data);
		AssetUploadObserver::setPendingUploads($product, $pendingUploads);
		$product->save();

		return redirect()->route('admin.products.index')->with('success', 'Product created.');
	}

	public function show(Product $product): View
	{
		return view('admin.products.show', compact('product'));
	}

	public function edit(Product $product): View
	{
		$brands = Brand::ordered()->get();
		return view('admin.products.edit', compact('product', 'brands'));
	}

	public function update(Request $request, Product $product, AssetServer $assetServer): RedirectResponse
	{
		$data = $request->validate([
			'brand_id' => 'required|exists:brands,id',
			'name' => 'required|string|max:255',
			'short_description' => 'nullable|string',
			'description' => 'nullable|string',
			'image_file' => 'nullable|image|max:51200',
			'file' => 'nullable|file|max:204800',
			'order' => 'nullable|integer',
			'status' => 'required|in:active,inactive',
		]);

		$data['slug'] = Str::slug($data['name']);

		$pendingUploads = [];
		if ($request->hasFile('image_file')) {
			$upload = $assetServer->upload($request->file('image_file'));
			$data['image'] = $upload['url'];
			$pendingUploads['image'] = $upload;
		}

		if ($request->hasFile('file')) {
			$upload = $assetServer->upload($request->file('file'));
			$data['file'] = $upload['url'];
			$pendingUploads['file'] = $upload;
		}

		AssetUploadObserver::setPendingUploads($product, $pendingUploads);
		$product->update($data);

		return redirect()->route('admin.products.index')->with('success', 'Product updated.');
	}

	public function destroy(Product $product): RedirectResponse
	{
		$product->delete();
		return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
	}
}
