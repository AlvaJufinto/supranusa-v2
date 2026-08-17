<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Supranusa Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: '#9d1f20',
            'brand-hover': '#7a1a1b',
          }
        }
      }
    }
  </script>
</head>

<body class="flex min-h-screen items-center justify-center bg-slate-100">
  <div class="w-full max-w-sm">
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg">
      <div class="border-b border-slate-300 px-8 py-6 text-center">
        <img src="/assets/logo/logo.png" alt="Logo">
        <p class="text-brand-100 mt-1 text-sm opacity-80">Admin Panel</p>
      </div>
      <div class="p-8">
        @if ($errors->any())
          <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700">
            {{ $errors->first() }}
          </div>
        @endif
        <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
          @csrf
          <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
              class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 outline-none transition focus:ring-2">
          </div>
          <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Password</label>
            <input type="password" name="password" required
              class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 outline-none transition focus:ring-2">
          </div>
          <button type="submit"
            class="bg-brand hover:bg-brand-hover w-full rounded-lg px-4 py-2.5 font-semibold text-white transition">
            Sign In
          </button>
        </form>
      </div>
    </div>
    <p class="mt-4 text-center text-xs text-slate-400">&copy; {{ date('Y') }}
      {{ $settings['company_name']->value }}. All rights
      reserved.</p>
  </div>
</body>

</html>
