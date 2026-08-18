<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Services\AssetServer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaController extends Controller
{
	public function index(): View
	{
		$media = Media::with('usable')
			->orderBy('created_at', 'desc')
			->paginate(24);
		return view('admin.media.index', compact('media'));
	}

	public function store(Request $request, AssetServer $assetServer): RedirectResponse
	{
		$request->validate([
			'file' => 'required|file|max:10240',
		]);

		$file = $request->file('file');
		$filename = $file->getClientOriginalName();
		$url = $assetServer->upload($file);

		Media::create([
			'filename' => $filename,
			'path' => $url,
			'mime_type' => $file->getMimeType(),
			'size' => $file->getSize(),
			'alt_text' => pathinfo($filename, PATHINFO_FILENAME),
		]);

		return back()->with('success', 'File uploaded.');
	}

	public function update(Request $request, Media $media): RedirectResponse
	{
		$media->update($request->validate([
			'alt_text' => 'nullable|string',
			'caption' => 'nullable|string',
		]));

		return back()->with('success', 'Media updated.');
	}

	public function destroy(Media $media): RedirectResponse
	{
		$media->delete();
		return back()->with('success', 'File deleted.');
	}
}
