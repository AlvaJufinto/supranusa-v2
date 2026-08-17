<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

	public function store(Request $request): RedirectResponse
	{
		$data = $request->validate([
			'title' => 'required|string|max:255',
			'thumbnail_file' => 'nullable|image|max:5120',
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

		if ($request->hasFile('thumbnail_file')) {
			$data['thumbnail'] = $request->file('thumbnail_file')->store('articles', 'public');
		}

		Article::create($data);

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

	public function update(Request $request, Article $article): RedirectResponse
	{
		$data = $request->validate([
			'title' => 'required|string|max:255',
			'thumbnail_file' => 'nullable|image|max:5120',
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

		if ($request->hasFile('thumbnail_file')) {
			if ($article->thumbnail) {
				Storage::disk('public')->delete($article->thumbnail);
			}
			$data['thumbnail'] = $request->file('thumbnail_file')->store('articles', 'public');
		}

		$article->update($data);

		return redirect()->route('admin.articles.index')->with('success', 'Article updated.');
	}

	public function destroy(Article $article): RedirectResponse
	{
		if ($article->thumbnail) {
			Storage::disk('public')->delete($article->thumbnail);
		}
		$article->delete();
		return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
	}
}
