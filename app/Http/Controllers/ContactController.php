<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
	public function index(): View
	{
		$settings = Setting::all()->keyBy('key');
		return view('contact.index', compact('settings'));
	}

	public function submit(Request $request): RedirectResponse
	{
		$data = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'phone' => 'nullable|string|max:50',
			'subject' => 'required|string|max:255',
			'message' => 'required|string',
		]);

		Contact::create($data);

		return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon.');
	}
}
