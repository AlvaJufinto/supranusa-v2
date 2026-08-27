<span class="inline-block px-2 py-1 text-xs rounded {{ $status === 'active' || $status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600' }}">
  {{ ucfirst($status) }}
</span>
