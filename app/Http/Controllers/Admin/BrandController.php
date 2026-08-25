<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Observers\AssetUploadObserver;
use App\Services\AssetServer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BrandController extends Controller
{
	public function index(): View
	{
		$brands = Brand::ordered()->get();
		return view('admin.brands.index', compact('brands'));
	}

	public function create(): View
	{
		return view('admin.brands.create');
	}

	public function store(Request $request, AssetServer $assetServer): RedirectResponse
	{
		$data = $request->validate([
			'name' => 'required|string|max:255',
			'description' => 'nullable|string',
			'image' => 'nullable|file|image|max:51200',
			'brand_pdf' => 'nullable|file|max:102400',
			'order' => 'nullable|integer',
		]);

		$data['slug'] = Str::slug($data['name']);

		$pendingUploads = [];
		if ($request->hasFile('image')) {
			$upload = $assetServer->upload($request->file('image'));
			$data['image'] = $upload['url'];
			$pendingUploads['image'] = $upload;
		}
		if ($request->hasFile('brand_pdf')) {
			$upload = $assetServer->upload($request->file('brand_pdf'));
			$data['brand_pdf'] = $upload['url'];
			$pendingUploads['brand_pdf'] = $upload;
		}

		$brand = new Brand($data);
		AssetUploadObserver::setPendingUploads($brand, $pendingUploads);
		$brand->save();

		return redirect()->route('admin.brands.index')->with('success', 'Brand created.');
	}

	public function edit(Brand $brand): View
	{
		return view('admin.brands.edit', compact('brand'));
	}

	public function show(Brand $brand): View
	{
		return view('admin.brands.show', compact('brand'));
	}

	public function update(Request $request, Brand $brand, AssetServer $assetServer): RedirectResponse
	{
		$data = $request->validate([
			'name' => 'required|string|max:255',
			'description' => 'nullable|string',
			'image' => 'nullable|file|image|max:51200',
			'brand_pdf' => 'nullable|file|max:102400',
			'order' => 'nullable|integer',
		]);

		$data['slug'] = Str::slug($data['name']);

		$pendingUploads = [];
		if ($request->hasFile('image')) {
			$upload = $assetServer->upload($request->file('image'));
			$data['image'] = $upload['url'];
			$pendingUploads['image'] = $upload;
		}
		if ($request->hasFile('brand_pdf')) {
			$upload = $assetServer->upload($request->file('brand_pdf'));
			$data['brand_pdf'] = $upload['url'];
			$pendingUploads['brand_pdf'] = $upload;
		}

		AssetUploadObserver::setPendingUploads($brand, $pendingUploads);
		$brand->update($data);

		return redirect()->route('admin.brands.index')->with('success', 'Brand updated.');
	}

	public function destroy(Brand $brand): RedirectResponse
	{
		$brand->delete();
		return redirect()->route('admin.brands.index')->with('success', 'Brand deleted.');
	}
}
