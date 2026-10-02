@extends('layouts.app')

@section('title', 'Kontak - SMKN 4 Bogor')

@section('content')

{{-- ========== BANNER KONTAK ========== --}}
<section class="relative overflow-hidden kontak-hero placeholder-img">
  <img src="{{ asset('images/kontak-banner.jpg') }}" alt="SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover"
       onerror="this.style.display='none'">
  <div class="absolute inset-0 kontak-hero-overlay"></div>
</section>

{{-- ========== KARTU INFO (nempel di bawah foto) ========== --}}
<section class="max-w-7xl mx-auto px-6 relative" style="margin-top: -70px;">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

    <div class="kontak-info-card">
      <div class="kontak-icon-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M12 21s7-6.5 7-11.5A7 7 0 105 9.5C5 14.5 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></div>
      <h4 class="font-bold mb-1" style="color: var(--navy);">Alamat</h4>
      <p class="text-sm text-gray-500 leading-relaxed">
        Jl. Raya Tajur No. 123, Kel. Muarasari,<br>
        Kec. Bogor Selatan, Kota Bogor,<br>
        Jawa Barat 16137
      </p>
    </div>

    <div class="kontak-info-card">
      <div class="kontak-icon-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 005 5L14 13l5 2v4a2 2 0 01-2 2C9.7 21 3 14.3 3 6a2 2 0 012-2z"/></svg></div>
      <h4 class="font-bold mb-1" style="color: var(--navy);">Telepon</h4>
      <p class="text-sm text-gray-500">+62 821 226 2442</p>
    </div>

    <div class="kontak-info-card">
      <div class="kontak-icon-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></div>
      <h4 class="font-bold mb-1" style="color: var(--navy);">Email</h4>
      <p class="text-sm text-gray-500">smkn4@smkn4bogor.sch.id</p>
    </div>

    <div class="kontak-info-card">
      <div class="kontak-icon-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></div>
      <h4 class="font-bold mb-1" style="color: var(--navy);">Jam Operasional</h4>
      <p class="text-sm text-gray-500">Senin – Jumat<br>07.00 – 16.00 WIB</p>
    </div>

  </div>
</section>

{{-- ========== FORM + HUBUNGI KAMI ========== --}}
<section class="max-w-7xl mx-auto px-6 py-16 grid lg:grid-cols-3 gap-8 items-start">

  {{-- Form kirim pesan --}}
  <div class="lg:col-span-2 kontak-form-card">
    <h2 class="text-xl font-extrabold mb-1 flex items-center gap-2" style="color: var(--navy);">
      Kirim Pesan <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4 inline"><path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4 20-7z"/></svg></span>
    </h2>
    <p class="text-sm text-gray-500 mb-6">
      Isi form di bawah ini dan kami akan segera merespons pesan Anda.
    </p>

    @if (session('success'))
      <div class="mb-5 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 flex items-center gap-2">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 flex-shrink-0">
          <path d="M20 6L9 17l-5-5"/>
        </svg>
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-5 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">
        <ul class="list-disc pl-5 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('kontak.store') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label class="block text-sm font-semibold mb-1" style="color: var(--navy);">Nama Lengkap</label>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda" class="kontak-input">
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1" style="color: var(--navy);">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" class="kontak-input">
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1" style="color: var(--navy);">Subjek</label>
        <input type="text" name="subjek" value="{{ old('subjek') }}" placeholder="Masukkan subjek pesan" class="kontak-input">
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1" style="color: var(--navy);">Pesan</label>
        <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." class="kontak-input">{{ old('pesan') }}</textarea>
      </div>

      <button type="submit" class="kontak-submit-btn">
        ✈️ Kirim Pesan
      </button>
    </form>
  </div>

  {{-- Hubungi Kami --}}
  <div class="kontak-side-card">
    <h3 class="text-lg font-extrabold mb-2 flex items-center gap-2" style="color: var(--navy);">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 005 5L14 13l5 2v4a2 2 0 01-2 2C9.7 21 3 14.3 3 6a2 2 0 012-2z"/></svg> Hubungi Kami
    </h3>
    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
      Anda juga dapat menghubungi kami melalui informasi berikut.
    </p>

    <div class="space-y-5">
      <div class="flex gap-3">
        <div class="kontak-side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M12 21s7-6.5 7-11.5A7 7 0 105 9.5C5 14.5 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></div>
        <div>
          <p class="font-semibold text-sm" style="color: var(--navy);">Alamat</p>
          <p class="text-sm text-gray-500">Jl. Raya Tajur No. 123, Kel. Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16137</p>
        </div>
      </div>

      <div class="flex gap-3">
        <div class="kontak-side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 005 5L14 13l5 2v4a2 2 0 01-2 2C9.7 21 3 14.3 3 6a2 2 0 012-2z"/></svg></div>
        <div>
          <p class="font-semibold text-sm" style="color: var(--navy);">Telepon</p>
          <p class="text-sm text-gray-500">+62 821 226 2442</p>
        </div>
      </div>

      <div class="flex gap-3">
        <div class="kontak-side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></div>
        <div>
          <p class="font-semibold text-sm" style="color: var(--navy);">Email</p>
          <p class="text-sm text-gray-500">smkn4@smkn4bogor.sch.id</p>
        </div>
      </div>

      <div class="flex gap-3">
        <div class="kontak-side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18 14 14 0 010-18z"/></svg></div>
        <div>
          <p class="font-semibold text-sm" style="color: var(--navy);">Website</p>
          <p class="text-sm text-gray-500">www.smkn4bogor.sch.id</p>
        </div>
      </div>
    </div>
  </div>

</section>

{{-- ========== LOKASI / PETA ========== --}}
<section class="max-w-7xl mx-auto px-6 pb-20">
  <h2 class="text-xl font-extrabold mb-4 flex items-center gap-2" style="color: var(--navy);">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M12 21s7-6.5 7-11.5A7 7 0 105 9.5C5 14.5 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg> Lokasi Kami
  </h2>

  <div class="kontak-map-wrap shadow-md">
    <iframe
      src="https://www.google.com/maps?q=SMKN+4+Bogor&output=embed"
      class="absolute inset-0 w-full h-full"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <div class="kontak-map-popup">
      <h4 class="font-bold mb-1" style="color: var(--navy);">SMKN 4 Bogor</h4>
      <p class="text-xs text-gray-500 mb-2 leading-relaxed">
        Jl. Raya Tajur No. 123, Bogor Selatan, Kota Bogor, Jawa Barat 16137
      </p>
      <a href="https://www.google.com/maps?q=SMKN+4+Bogor" target="_blank"
         class="text-xs font-semibold" style="color: var(--navy);">
        Lihat di Google Maps ↗
      </a>
    </div>
  </div>
</section>

@endsection