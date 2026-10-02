<header class="w-full sticky top-0 z-50 navbar-bg">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-2">
      <span class="font-bold text-white text-sm leading-tight">SMKN 4<br>Bogor</span>
    </div>

    {{-- Menu buat layar besar (laptop/PC) --}}
    <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
      <a href="/" class="nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}">Beranda</a>
      <a href="/profil-sekolah" class="nav-link {{ request()->is('profil-sekolah') ? 'nav-link-active' : '' }}">Profil Sekolah</a>
      <a href="/berita" class="nav-link {{ request()->is('berita') ? 'nav-link-active' : '' }}">Berita</a>
      <a href="/galeri" class="nav-link {{ request()->is('galeri') ? 'nav-link-active' : '' }}">Galeri</a>
      <a href="/ekstrakurikuler" class="nav-link {{ request()->is('ekstrakurikuler') ? 'nav-link-active' : '' }}">Ekstrakurikuler</a>
      <a href="/produk" class="nav-link {{ request()->is('produk') ? 'nav-link-active' : '' }}">Produk</a>
      <a href="/kontak" class="nav-link {{ request()->is('kontak') ? 'nav-link-active' : '' }}">Kontak</a>
      <a href="/login-admin" class="nav-link {{ request()->is('login-admin') ? 'nav-link-active' : '' }}">Login Admin</a>
    </nav>

    {{-- Tombol hamburger, cuma muncul di layar kecil (HP/tablet) --}}
    <button id="hamburgerBtn" type="button" class="md:hidden text-white p-2" aria-label="Buka menu">
      <svg id="iconHamburger" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6">
        <path d="M3 6h18M3 12h18M3 18h18"/>
      </svg>
      <svg id="iconClose" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6 hidden">
        <path d="M18 6L6 18M6 6l12 12"/>
      </svg>
    </button>
  </div>

  {{-- Menu dropdown buat layar kecil, awalnya ketutup --}}
  <nav id="mobileMenu" class="md:hidden hidden flex-col px-6 pb-4 gap-1 text-sm font-medium navbar-bg">
    <a href="/" class="nav-link block py-2 {{ request()->is('/') ? 'nav-link-active' : '' }}">Beranda</a>
    <a href="/profil-sekolah" class="nav-link block py-2 {{ request()->is('profil-sekolah') ? 'nav-link-active' : '' }}">Profil Sekolah</a>
    <a href="/berita" class="nav-link block py-2 {{ request()->is('berita') ? 'nav-link-active' : '' }}">Berita</a>
    <a href="/galeri" class="nav-link block py-2 {{ request()->is('galeri') ? 'nav-link-active' : '' }}">Galeri</a>
    <a href="/ekstrakurikuler" class="nav-link block py-2 {{ request()->is('ekstrakurikuler') ? 'nav-link-active' : '' }}">Ekstrakurikuler</a>
    <a href="/produk" class="nav-link block py-2 {{ request()->is('produk') ? 'nav-link-active' : '' }}">Produk</a>
    <a href="/kontak" class="nav-link block py-2 {{ request()->is('kontak') ? 'nav-link-active' : '' }}">Kontak</a>
    <a href="/login-admin" class="nav-link block py-2 {{ request()->is('login-admin') ? 'nav-link-active' : '' }}">Login Admin</a>
  </nav>
</header>

<script>
  (function () {
    var btn = document.getElementById('hamburgerBtn');
    var menu = document.getElementById('mobileMenu');
    var iconHamburger = document.getElementById('iconHamburger');
    var iconClose = document.getElementById('iconClose');

    if (!btn || !menu) return;

    btn.addEventListener('click', function () {
      var isOpen = !menu.classList.contains('hidden');
      if (isOpen) {
        menu.classList.add('hidden');
        menu.classList.remove('flex');
        iconHamburger.classList.remove('hidden');
        iconClose.classList.add('hidden');
      } else {
        menu.classList.remove('hidden');
        menu.classList.add('flex');
        iconHamburger.classList.add('hidden');
        iconClose.classList.remove('hidden');
      }
    });
  })();
</script>