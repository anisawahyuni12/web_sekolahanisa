{{-- TARO FILE INI DI: resources/views/auth/hubungi-administrator.blade.php (REPLACE file yang lama) --}}
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hubungi Administrator - SMKN 4 Bogor</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <div class="card">
    {{-- Logo bentuk perisai: file gambar ada di public/images/logo-perisai.png --}}
    <img class="logo" src="{{ asset('images/logo-perisai.png') }}" alt="Logo SMKN 4 Bogor"
         style="width:95px; height:auto; border-radius:0; border:none; box-shadow:none; background:transparent; object-fit:contain;">
    <div class="school-name">SMKN 4 BOGOR</div>
    <h1 class="title">Hubungi Administrator</h1>
    <p class="subtitle">
      Lupa password atau belum mempunyai akun?<br>
      Silakan hubungi administrator sekolah melalui salah satu kontak di bawah ini.
    </p>

    {{-- Ganti nomor/email di bawah sesuai kontak admin sekolah kamu --}}
    <a href="https://wa.me/6285692488790" class="contact-item" target="_blank">
      <span class="ic">&#128241;</span>
      <div>
        <div class="label">WhatsApp</div>
        <div class="value">0856-9248-8790</div>
      </div>
    </a>

    <div style="text-align:center; margin-top:20px;">
      <a href="/login-admin" style="color:#2b5fb3; font-size:13px; text-decoration:none;">&larr; Kembali ke Halaman Login</a>
    </div>
  </div>

</body>
</html>