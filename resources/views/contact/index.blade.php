@extends('layouts.app')
@section('title', 'Contact')

@section('content')
  <section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-6">
      @if (session('success'))
        <div class="mb-8 rounded-lg bg-green-100 p-4 text-green-800 text-center">{{ session('success') }}</div>
      @endif
      <div class="mb-12 text-center">
        <h1 class="text-3xl font-extrabold text-slate-800 sm:text-4xl">CONTACT US</h1>
        <p class="mt-2 text-slate-500">Do not hesitate to talk to us</p>
      </div>
      <div class="grid gap-10 lg:grid-cols-3">
        <div class="shadow-soft rounded-2xl border border-slate-200 bg-white p-6">
          <h3 class="mb-4 text-lg font-bold text-slate-800">
            {{ $settings['company_name']->value ?? 'PT SUPRANUSA NIAGAJAYA' }}</h3>
          <ul class="space-y-3 text-sm text-slate-600">
            @if (!empty($settings['contact_address']->value))
              <li class="flex items-start gap-3">
                <svg class="text-brand mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $settings['contact_address']->value }}</span>
              </li>
            @endif
            @if (!empty($settings['contact_phone']->value))
              <li class="flex items-center gap-3">
                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>{{ $settings['contact_phone']->value }}</span>
              </li>
            @endif
            @if (!empty($settings['contact_fax']->value))
              <li class="flex items-center gap-3">
                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                <span>{{ $settings['contact_fax']->value }}</span>
              </li>
            @endif
            @if (!empty($settings['contact_email']->value))
              <li class="flex items-center gap-3">
                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>{{ $settings['contact_email']->value }}</span>
              </li>
            @endif
            @if (!empty($settings['contact_website']->value))
              <li class="flex items-center gap-3">
                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <span>{{ $settings['contact_website']->value }}</span>
              </li>
            @endif
          </ul>
        </div>
        <div class="shadow-soft rounded-2xl border border-slate-200 bg-white p-6 lg:col-span-2">
          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Name</label>
                <input type="text" name="name" required
                  class="focus:border-brand focus:ring-brand/30 w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2">
              </div>
              <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" required
                  class="focus:border-brand focus:ring-brand/30 w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2">
              </div>
            </div>
            <div class="mb-4">
              <label class="mb-1 block text-sm font-medium text-slate-700">Subject</label>
              <input type="text" name="subject" required
                class="focus:border-brand focus:ring-brand/30 w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2">
            </div>
            <div class="mb-6">
              <label class="mb-1 block text-sm font-medium text-slate-700">Message</label>
              <textarea name="message" rows="5" required
                class="focus:border-brand focus:ring-brand/30 w-full resize-none rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2"></textarea>
            </div>
            <div class="flex gap-3">
              <button type="submit"
                class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-3 font-semibold text-white transition">Send
                Message</button>
              <a href="{{ route('home') }}"
                class="hover:border-brand hover:text-brand rounded-lg border border-slate-300 px-6 py-3 font-medium text-slate-600 transition">Back
                to Home</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
