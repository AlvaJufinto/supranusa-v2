@extends('layouts.admin')
@section('title', $contact->name)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Contact Submission</h1>
    <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Back</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Name</label>
            <p class="text-slate-800">{{ $contact->name }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Email</label>
            <p class="text-slate-800">{{ $contact->email }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Phone</label>
            <p class="text-slate-800">{{ $contact->phone ?? '—' }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Submitted At</label>
            <p class="text-slate-800">{{ $contact->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Subject</label>
        <p class="text-slate-800">{{ $contact->subject }}</p>
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Message</label>
        <div class="bg-slate-50 rounded-lg p-4 text-slate-700 whitespace-pre-wrap">{{ $contact->message }}</div>
    </div>
</div>
@endsection
