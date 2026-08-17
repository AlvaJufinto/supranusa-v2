@extends('layouts.admin')
@section('title', 'Settings')

@section('content')
  <h1 class="mb-6 text-2xl font-bold">Settings</h1>
  <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="mb-4 text-lg font-semibold">General</h2>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
          <label class="mb-1 block text-sm font-medium">Company Name</label>
          <input type="text" name="company_name" value="{{ $settings['company_name']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Tagline</label>
          <input type="text" name="tagline" value="{{ $settings['tagline']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Hero Title</label>
          <input type="text" name="hero_title" value="{{ $settings['hero_title']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Hero Subtitle</label>
          <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
      </div>
    </div>

    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="mb-4 text-lg font-semibold">SEO</h2>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
          <label class="mb-1 block text-sm font-medium">Meta Description</label>
          <textarea name="meta_description" rows="3"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">{{ $settings['meta_description']->value ?? '' }}</textarea>
        </div>
        {{-- <div>
          <label class="mb-1 block text-sm font-medium">Theme Color</label>
          <input type="text" name="theme_color" value="{{ $settings['theme_color']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div> --}}
      </div>
    </div>

    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="mb-4 text-lg font-semibold">About</h2>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
          <label class="mb-1 block text-sm font-medium">Year Established</label>
          <input type="text" name="about_year_established"
            value="{{ $settings['about_year_established']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Expansion Year</label>
          <input type="text" name="about_expansion_year" value="{{ $settings['about_expansion_year']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Values</label>
          <input type="text" name="about_values" value="{{ $settings['about_values']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
      </div>
      <div class="mt-4">
        <label class="mb-1 block text-sm font-medium">About Content</label>
        <textarea name="about_content" rows="5"
          class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">{{ $settings['about_content']->value ?? '' }}</textarea>
      </div>
    </div>

    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="mb-4 text-lg font-semibold">Contact</h2>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
          <label class="mb-1 block text-sm font-medium">Address</label>
          <textarea name="contact_address" rows="3"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">{{ $settings['contact_address']->value ?? '' }}</textarea>
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Phone</label>
          <input type="text" name="contact_phone" value="{{ $settings['contact_phone']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
          <label class="mb-1 mt-4 block text-sm font-medium">Fax</label>
          <input type="text" name="contact_fax" value="{{ $settings['contact_fax']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
      </div>
      <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
          <label class="mb-1 block text-sm font-medium">Email</label>
          <input type="email" name="contact_email" value="{{ $settings['contact_email']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium">Website</label>
          <input type="url" name="contact_website" value="{{ $settings['contact_website']->value ?? '' }}"
            class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
        </div>
      </div>
    </div>

    {{-- <div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">BAC</label>
                <textarea name="product_bac" rows="2" class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-brand focus:outline-none">{{ $settings['product_bac']->value ?? '' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Armacell</label>
                <textarea name="product_armacell" rows="2" class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-brand focus:outline-none">{{ $settings['product_armacell']->value ?? '' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Siemens</label>
                <textarea name="product_siemens" rows="2" class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-brand focus:outline-none">{{ $settings['product_siemens']->value ?? '' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Pipes</label>
                <textarea name="product_pipes" rows="2" class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-brand focus:outline-none">{{ $settings['product_pipes']->value ?? '' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Hira</label>
                <textarea name="product_hira" rows="2" class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-brand focus:outline-none">{{ $settings['product_hira']->value ?? '' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Ducting</label>
                <textarea name="product_ducting" rows="2" class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-brand focus:outline-none">{{ $settings['product_ducting']->value ?? '' }}</textarea>
            </div>
        </div>
    </div> --}}

    <button type="submit" class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-3 font-semibold text-white">Save
      Settings</button>
  </form>
@endsection
