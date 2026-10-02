{{-- TARO FILE INI DI: resources/views/login.blade.php (REPLACE file yang lama) --}}
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin - SMKN 4 Bogor</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <div class="login-card">
    {{-- Logo bentuk perisai: file gambar ada di public/images/logo-perisai.png --}}
    <img class="logo" src="{{ asset('images/logo-perisai.png') }}" alt="Logo SMKN 4 Bogor"
         style="width:95px; height:auto; border-radius:0; border:none; box-shadow:none; background:transparent; object-fit:contain;">
    <div class="school-name">SMKN 4 BOGOR</div>
    <h1 class="title">Login Admin</h1>
    <p class="subtitle">Masuk untuk mengelola website sekolah</p>

    <form id="loginForm" action="/login-admin" method="POST">
      @csrf

      @if ($errors->any())
        <div style="color:#d33; font-size:13px; margin-bottom:12px; text-align:left;">
          {{ $errors->first() }}
        </div>
      @endif

      <div class="input-group">
        <span class="icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/></svg>
        </span>
        <input type="text" name="username" id="username" placeholder="Email atau Username" value="{{ old('username') }}" required>
      </div>

      <div class="input-group">
        <span class="icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2"><rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
        </span>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="button" class="toggle-password" onclick="togglePassword()">
          <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/><line x1="3" y1="3" x2="21" y2="21"/></svg>
        </button>
      </div>

      <div class="row">
        <label class="remember">
          <input type="checkbox" name="remember" id="rememberMe">
          Ingat saya
        </label>

        {{-- Lupa Password langsung ke halaman Hubungi Administrator --}}
        <a href="/hubungi-administrator" class="forgot-link">Lupa Password?</a>
      </div>

      <button type="submit" class="btn-login">MASUK</button>
    </form>

    <div class="footer-text">
      Belum punya akun? <a href="/hubungi-administrator">Hubungi Administrator</a>
    </div>

    <div style="text-align:center; margin-top:14px;">
      <a href="/" style="color:#2b5fb3; font-size:13px; text-decoration:none;">&larr; Kembali ke Beranda</a>
    </div>
  </div>

  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>