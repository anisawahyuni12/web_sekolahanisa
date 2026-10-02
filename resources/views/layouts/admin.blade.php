<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Admin - SMKN 4 Bogor')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/effects.css') }}">
</head>
<body class="bg-white">

  <div class="admin-sidebar">
    <div class="admin-sidebar-brand">
      <span class="admin-sidebar-title">SMKN 4<br>BOGOR</span>
    </div>

    <nav class="admin-nav">
      <a href="{{ url('/dashboard') }}" class="admin-nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <rect x="3" y="3" width="7" height="7" rx="1.5"/>
          <rect x="14" y="3" width="7" height="7" rx="1.5"/>
          <rect x="3" y="14" width="7" height="7" rx="1.5"/>
          <rect x="14" y="14" width="7" height="7" rx="1.5"/>
        </svg>
        Dashboard
      </a>
      <a href="{{ url('/dashboard/produk') }}" class="admin-nav-link {{ request()->is('dashboard/produk') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <path d="M21 8L12 3 3 8v8l9 5 9-5V8z"/>
          <path d="M3 8l9 5 9-5"/>
          <path d="M12 13v8"/>
        </svg>
        Kelola Produk
      </a>
      <a href="{{ url('/dashboard/galeri') }}" class="admin-nav-link {{ request()->is('dashboard/galeri') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <rect x="3" y="4" width="18" height="16" rx="2"/>
          <circle cx="8.5" cy="9.5" r="1.5"/>
          <path d="M21 16l-5.5-5.5L9 17"/>
        </svg>
        Galeri
      </a>
      <a href="{{ url('/dashboard/ekstrakurikuler') }}" class="admin-nav-link {{ request()->is('dashboard/ekstrakurikuler') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <circle cx="9" cy="8" r="3"/>
          <path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/>
          <circle cx="17" cy="9" r="2.5"/>
          <path d="M15 14.2c2.9.5 5 2.6 5 5.8"/>
        </svg>
        Ekstrakurikuler
      </a>
      <a href="{{ url('/dashboard/berita') }}" class="admin-nav-link {{ request()->is('dashboard/berita') ? 'active' : '' }}">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
    <path d="M4 4h13a2 2 0 012 2v13a1 1 0 01-1.7.7L15 17H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>
    <path d="M6 8h9M6 11h9M6 14h5"/>
  </svg>
  Berita
</a>

      <a href="{{ url('/dashboard/kontak') }}" class="admin-nav-link {{ request()->is('dashboard/kontak') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <path d="M4 4h16v16H4z"/>
          <path d="M22 6l-10 7L2 6"/>
        </svg>
        Kontak
      </a>

        <a href="{{ url('/login-admin') }}" class="admin-logout">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
        <path d="M16 17l5-5-5-5"/>
        <path d="M21 12H9"/>
      </svg>
      Logout
    </a>
  </div>

  <div class="admin-main">
    @yield('content')
  </div>

  <script src="{{ asset('js/effects.js') }}"></script>
</body>
</html>