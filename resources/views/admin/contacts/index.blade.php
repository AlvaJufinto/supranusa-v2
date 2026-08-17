@extends('layouts.admin')
@section('title', 'Contacts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Contact Submissions</h1>
</div>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Name</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Email</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Subject</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Submitted</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-t border-slate-200">
                <td class="px-6 py-4 font-medium">{{ $contact->name }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $contact->email }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $contact->subject }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $contact->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-brand hover:underline">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-slate-500">No contact submissions yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
