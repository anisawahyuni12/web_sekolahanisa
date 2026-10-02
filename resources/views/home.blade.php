@extends('layouts.app')

@section('title', 'SMKN 4 Bogor')

@section('content')

<section id="beranda" class="hero-bg relative overflow-hidden">
  {{-- Foto latar belakang (aerial/drone). Kalau file belum ada, otomatis disembunyikan & fallback ke warna navy --}}
  <img src="{{ asset('images/hero-bg.jpg') }}" alt="Foto udara SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover"
       onerror="this.style.display='none'">
  {{-- Lapisan gelap transparan supaya teks putih tetap kebaca di atas foto --}}
  <div class="absolute inset-0 hero-overlay"></div>

  <div class="max-w-7xl mx-auto px-6 py-20 md:py-28 grid md:grid-cols-2 gap-10 items-center relative z-10">

    <div class="text-white">
      <p class="tracking-wide text-sm text-[var(--gold)] font-semibold mb-3">Selamat datang di</p>
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">SMKN 4 BOGOR</h1>
      <p class="text-white/90 max-w-md mb-8 leading-relaxed">
        Sekolah menengah kejuruan yang berkomitmen mencetak generasi unggul,
        kompeten, dan berkarakter di bidang teknologi dan berakhlak mulia.
      </p>
      <div class="flex gap-4">
        <a href="#tentang" class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-3 rounded-full font-semibold">Tentang Sekolah</a>
        <a href="#berita" class="bg-white/20 hover:bg-white/30 transition backdrop-blur text-white px-6 py-3 rounded-full font-semibold">Lihat Berita</a>
      </div>
    </div>

    {{-- Foto kedua yang dibingkai, ditumpuk & dimiringkan sedikit --}}
    <div class="relative hidden md:block">
      <div class="relative rotate-2 rounded-2xl overflow-hidden border-4 border-white shadow-2xl aspect-[4/3] z-10 placeholder-img">
        <img src="{{ asset('images/hero-foto.jpg') }}" alt="Foto SMKN 4 Bogor"
             class="w-full h-full object-cover"
             onerror="this.style.display='none'">
      </div>
      <div class="absolute -bottom-6 -left-6 w-24 h-24 rounded-full bg-[var(--gold)] z-20 shadow-xl"></div>
    </div>

  </div>
</section>

{{-- ========== BERITA TERKINI (diambil dari database, 3 berita terbaru) ========== --}}
<section id="berita" class="max-w-7xl mx-auto px-6 py-20">
  <div class="mb-10">
    <h2 class="text-3xl font-extrabold text-[var(--navy)] mb-1">Berita Terkini</h2>
    <p class="text-sm text-gray-400">Beranda &gt; Berita</p>
  </div>

  <div class="grid md:grid-cols-3 gap-8">

    @forelse ($beritaTerkini as $berita)
      <article class="rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition bg-white">
        <div class="aspect-[4/5] news-badge">
          <img src="{{ asset('images/' . $berita->foto) }}" alt="{{ $berita->judul }}"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'">
        </div>
        <div class="p-5">
          <p class="text-xs text-gray-400 mb-1">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}</p>
          <h3 class="font-bold text-[var(--navy)] leading-snug">{{ strtoupper($berita->judul) }}</h3>
        </div>
      </article>
    @empty
      <p class="md:col-span-3 text-center text-gray-400 py-10">Belum ada berita.</p>
    @endforelse

  </div>
</section>

<section id="program" class="bg-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-extrabold text-[var(--navy)] mb-12">Program Keahlian</h2>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">

      <!-- TJKT -->
      <div class="bg-white rounded-2xl shadow-sm overflow-hidden pb-8 flex flex-col items-center">
        <div class="w-full aspect-[4/3] news-badge">
          <img src="{{ asset('images/program-1.jpg') }}" alt="Uji Level Kelas X TJKT SMKN 4 Bogor"
               class="w-full h-full object-cover" onerror="this.style.display='none'">
        </div>
        <div class="w-20 h-20 rounded-2xl bg-white -mt-4 border-4 border-white shadow-lg overflow-hidden z-10">
          <img src="{{ asset('images/logo-tjkt.png') }}" alt="Logo TJKT"
               class="w-full h-full object-contain" onerror="this.style.display='none'">
        </div>
        <p class="mt-4 text-sm font-semibold text-gray-600 text-center px-4">Teknik Jaringan Komputer &amp; Telekomunikasi</p>
      </div>

      <!-- PPLG -->
      <div class="bg-white rounded-2xl shadow-sm overflow-hidden pb-8 flex flex-col items-center">
        <div class="w-full aspect-[4/3] news-badge">
          <img src="{{ asset('images/program-2.jpg') }}" alt="Uji Level Kelas X PPLG SMKN 4 Bogor"
               class="w-full h-full object-cover" onerror="this.style.display='none'">
        </div>
        <div class="w-20 h-20 rounded-full bg-white -mt-4 border-4 border-white shadow-lg overflow-hidden z-10">
          <img src="{{ asset('images/logo-pplg.png') }}" alt="Logo PPLG"
               class="w-full h-full object-contain" onerror="this.style.display='none'">
        </div>
        <p class="mt-4 text-sm font-semibold text-gray-600 text-center px-4">Pengembangan Perangkat Lunak &amp; Gim</p>
      </div>

      <!-- TFL -->
      <div class="bg-white rounded-2xl shadow-sm overflow-hidden pb-8 flex flex-col items-center">
        <div class="w-full aspect-[4/3] news-badge">
          <img src="{{ asset('images/program-3.jpg') }}" alt="Pembiasaan Positif Konsentrasi Keahlian TFL"
               class="w-full h-full object-cover" onerror="this.style.display='none'">
        </div>
        <div class="w-20 h-20 rounded-full bg-white -mt-4 border-4 border-white shadow-lg overflow-hidden z-10">
          <img src="{{ asset('images/logo-tfl.png') }}" alt="Logo TFL"
               class="w-full h-full object-contain" onerror="this.style.display='none'">
        </div>
        <p class="mt-4 text-sm font-semibold text-gray-600 text-center px-4">Teknik Fabrikasi Logam</p>
      </div>

      <!-- Teknik Otomotif -->
      <div class="bg-white rounded-2xl shadow-sm overflow-hidden pb-8 flex flex-col items-center">
        <div class="w-full aspect-[4/3] news-badge">
          <img src="{{ asset('images/program-4.jpg') }}" alt="LKS Tingkat Kota Bogor Bidang Keahlian Teknik Otomotif"
               class="w-full h-full object-cover" onerror="this.style.display='none'">
        </div>
        <div class="w-20 h-20 rounded-2xl bg-white -mt-4 border-4 border-white shadow-lg overflow-hidden z-10">
          <img src="{{ asset('images/logo-otomotif.png') }}" alt="Logo Teknik Otomotif"
               class="w-full h-full object-contain" onerror="this.style.display='none'">
        </div>
        <p class="mt-4 text-sm font-semibold text-gray-600 text-center px-4">Teknik Otomotif</p>
      </div>

    </div>
  </div>
</section>

<!-- ========== TENTANG SEKOLAH + VISI + MISI ========== -->
<section id="tentang" class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-x-10" style="align-items: start;">

  <!-- Kolom kiri: foto + teks Tentang Sekolah -->
  <div class="flex flex-col gap-6">
    <div class="rounded-2xl overflow-hidden placeholder-img aspect-[4/3]">
      <img src="{{ asset('images/tentang-foto.jpg') }}" alt="Foto udara area sekolah SMKN 4 Bogor"
           class="w-full h-full object-cover" onerror="this.style.display='none'">
    </div>

    <div>
      <h2 class="text-2xl font-extrabold text-[var(--navy)] mb-3 pb-3 border-b border-gray-200">Tentang Sekolah</h2>
      <p class="text-gray-600 leading-relaxed">
        SMKN 4 Bogor berdiri sejak tahun 1985 dengan tujuan mencetak generasi muda
        yang kompeten di bidang teknologi dan berakhlak mulia. Kami menyediakan
        kurikulum yang relevan dengan kebutuhan industri masa kini.
      </p>
    </div>
  </div>

  <!-- Kolom kanan: kartu VISI + kartu MISI -->
  <div class="flex flex-col gap-6">
    <div class="border border-gray-200 rounded-2xl p-8 text-center shadow-sm">
      <div class="w-16 h-16 mx-auto rounded-full bg-[var(--navy)] overflow-hidden mb-4">
        <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo SMKN 4 Bogor"
             class="w-full h-full object-contain" onerror="this.style.display='none'">
      </div>
      <span class="inline-block bg-[var(--navy)] text-white text-xs font-bold px-4 py-1 rounded-full mb-4">VISI</span>
      <p class="text-[var(--navy)] font-bold text-lg leading-snug">
        Menjadi sekolah vokasi unggul yang menghasilkan lulusan berkompeten,
        berkarakter, dan berdaya saing global.
      </p>
      <div class="w-10 h-1 bg-[var(--gold)] mx-auto mt-5 rounded-full"></div>
    </div>

    <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-sm">
      <div class="hero-bg py-3 text-center">
        <span class="text-white font-bold tracking-wide text-sm">MISI</span>
      </div>
      <ul class="divide-y divide-gray-100">
        <li class="flex items-start gap-4 p-4">
          <span class="w-7 h-7 shrink-0 rounded-full bg-[var(--navy)] text-white text-xs font-bold flex items-center justify-center">1</span>
          <span class="text-lg leading-none flex items-center" style="color: var(--navy);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M2 9l10-5 10 5-10 5-10-5z"/><path d="M6 11v5c0 1.5 3 3 6 3s6-1.5 6-3v-5"/></svg></span>
          <p class="text-sm text-gray-600 leading-relaxed">Menyelenggarakan pendidikan dan pelatihan vokasi yang berkualitas sesuai kebutuhan dunia kerja.</p>
        </li>
        <li class="flex items-start gap-4 p-4">
          <span class="w-7 h-7 shrink-0 rounded-full bg-[var(--navy)] text-white text-xs font-bold flex items-center justify-center">2</span>
          <span class="text-lg leading-none flex items-center" style="color: var(--navy);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M9 18h6M10 22h4"/><path d="M12 2a7 7 0 00-4 12.7c.7.6 1 1.4 1 2.3h6c0-.9.3-1.7 1-2.3A7 7 0 0012 2z"/></svg></span>
          <p class="text-sm text-gray-600 leading-relaxed">Mengembangkan kompetensi siswa melalui pembelajaran inovatif dan berbasis teknologi.</p>
        </li>
        <li class="flex items-start gap-4 p-4">
          <span class="w-7 h-7 shrink-0 rounded-full bg-[var(--navy)] text-white text-xs font-bold flex items-center justify-center">3</span>
          <span class="text-lg leading-none flex items-center" style="color: var(--navy);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M12 2l3 7h7l-5.5 4.5L18.5 21 12 16.5 5.5 21l2-7.5L2 9h7z"/></svg></span>
          <p class="text-sm text-gray-600 leading-relaxed">Menanamkan nilai-nilai karakter, disiplin, dan budaya kerja profesional.</p>
        </li>
        <li class="flex items-start gap-4 p-4">
          <span class="w-7 h-7 shrink-0 rounded-full bg-[var(--navy)] text-white text-xs font-bold flex items-center justify-center">4</span>
          <span class="text-lg leading-none flex items-center" style="color: var(--navy);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><path d="M8 12l2.5 2.5L16 9"/><circle cx="12" cy="12" r="9"/></svg></span>
          <p class="text-sm text-gray-600 leading-relaxed">Membangun kemitraan dengan dunia industri dan masyarakat demi peningkatan kualitas lulusan.</p>
        </li>
        <li class="flex items-start gap-4 p-4">
          <span class="w-7 h-7 shrink-0 rounded-full bg-[var(--navy)] text-white text-xs font-bold flex items-center justify-center">5</span>
          <span class="text-lg leading-none flex items-center" style="color: var(--navy);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18 14 14 0 010-18z"/></svg></span>
          <p class="text-sm text-gray-600 leading-relaxed">Menciptakan lingkungan sekolah yang aman, nyaman, dan kondusif untuk belajar.</p>
        </li>
      </ul>
    </div>
  </div>

</section>

<section id="kontak" class="max-w-7xl mx-auto px-6 py-20">
  <h2 class="text-3xl font-extrabold text-[var(--navy)] mb-10 text-center">Hubungi Kami</h2>
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
    <div>
      <div class="w-12 h-12 mx-auto rounded-full bg-[var(--navy)] text-white flex items-center justify-center mb-3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6"><path d="M12 21s7-6.5 7-11.5A7 7 0 105 9.5C5 14.5 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></div>
      <h4 class="font-semibold text-[var(--navy)] mb-1">Alamat</h4>
      <p class="text-sm text-gray-500">Jl. Contoh Raya No. 4, Kota Bogor, Jawa Barat</p>
    </div>
    <div>
      <div class="w-12 h-12 mx-auto rounded-full bg-[var(--navy)] text-white flex items-center justify-center mb-3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></div>
      <h4 class="font-semibold text-[var(--navy)] mb-1">Email</h4>
      <p class="text-sm text-gray-500">info@smkn4bogor.sch.id</p>
    </div>
    <div>
      <div class="w-12 h-12 mx-auto rounded-full bg-[var(--navy)] text-white flex items-center justify-center mb-3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 005 5L14 13l5 2v4a2 2 0 01-2 2C9.7 21 3 14.3 3 6a2 2 0 012-2z"/></svg></div>
      <h4 class="font-semibold text-[var(--navy)] mb-1">Telepon</h4>
      <p class="text-sm text-gray-500">(0251) 000-0000</p>
    </div>
    <div>
      <div class="w-12 h-12 mx-auto rounded-full bg-[var(--navy)] text-white flex items-center justify-center mb-3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18 14 14 0 010-18z"/></svg></div>
      <h4 class="font-semibold text-[var(--navy)] mb-1">Website</h4>
      <p class="text-sm text-gray-500">www.smkn4bogor.sch.id</p>
    </div>
  </div>
</section>

@endsection