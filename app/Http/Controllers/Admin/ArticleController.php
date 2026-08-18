<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Observers\AssetUploadObserver;
use App\Services\AssetServer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
	public function index(): View
	{
		$articles = Article::orderBy('created_at', 'desc')->get();
		return view('admin.articles.index', compact('articles'));
	}

	public function create(): View
	{
		return view('admin.articles.create');
	}

	public function store(Request $request, AssetServer $assetServer): RedirectResponse
	{
		$data = $request->validate([
			'title' => 'required|string|max:255',
			'thumbnail_file' => 'nullable|image|max:51200',
			'excerpt' => 'nullable|string',
			'content' => 'nullable|string',
			'status' => 'required|in:published,draft',
			'published_at' => 'nullable|date',
			'meta_title' => 'nullable|string',
			'meta_description' => 'nullable|string',
			'meta_keywords' => 'nullable|string',
			'og_image' => 'nullable|string',
		]);

		$data['slug'] = Str::slug($data['title']);

		$pendingUploads = [];
		if ($request->hasFile('thumbnail_file')) {
			$upload = $assetServer->upload($request->file('thumbnail_file'));
			$data['thumbnail'] = $upload['url'];
			$pendingUploads['thumbnail'] = $upload;
		}

		$article = new Article($data);
		AssetUploadObserver::setPendingUploads($article, $pendingUploads);
		$article->save();

		return redirect()->route('admin.articles.index')->with('success', 'Article created.');
	}

	public function edit(Article $article): View
	{
		return view('admin.articles.edit', compact('article'));
	}

	public function show(Article $article): View
	{
		return view('admin.articles.show', compact('article'));
	}

	public function update(Request $request, Article $article, AssetServer $assetServer): RedirectResponse
	{
		$data = $request->validate([
			'title' => 'required|string|max:255',
			'thumbnail_file' => 'nullable|image|max:51200',
			'excerpt' => 'nullable|string',
			'content' => 'nullable|string',
			'status' => 'required|in:published,draft',
			'published_at' => 'nullable|date',
			'meta_title' => 'nullable|string',
			'meta_description' => 'nullable|string',
			'meta_keywords' => 'nullable|string',
			'og_image' => 'nullable|string',
		]);

		$data['slug'] = Str::slug($data['title']);

		$pendingUploads = [];
		if ($request->hasFile('thumbnail_file')) {
			$upload = $assetServer->upload($request->file('thumbnail_file'));
			$data['thumbnail'] = $upload['url'];
			$pendingUploads['thumbnail'] = $upload;
		}

		AssetUploadObserver::setPendingUploads($article, $pendingUploads);
		$article->update($data);

		return redirect()->route('admin.articles.index')->with('success', 'Article updated.');
	}

	public function destroy(Article $article): RedirectResponse
	{
		$article->delete();
		return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
	}
}
