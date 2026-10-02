@extends('layouts.app')

@section('title', 'Profil Sekolah - SMKN 4 Bogor')

@section('content')

{{-- ========== BANNER PROFIL SEKOLAH ========== --}}
<section class="relative overflow-hidden profil-hero">
  <img src="{{ asset('images/profil-banner.jpg') }}" alt="Lapangan SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover"
       onerror="this.style.display='none'">
  <div class="absolute inset-0 bg-black/45"></div>

  <div class="relative z-10 h-full flex flex-col justify-center profil-hero" style="padding: 2rem 0;">
    <h1 class="text-white font-extrabold w-full text-left profil-hero-title">
      Profil Sekolah
    </h1>
  </div>
</section>

{{-- ========== SAMBUTAN KEPALA SEKOLAH ========== --}}
<section class="max-w-7xl mx-auto px-6 py-16 flex flex-col md:flex-row gap-10 items-center">

  {{-- Foto dengan bentuk dekoratif di belakangnya --}}
  <div class="relative max-w-xs w-full shrink-0">
    <div class="absolute -top-4 -left-6 w-full h-full rounded-2xl bg-blue-50 -z-10"></div>
    <div class="rounded-2xl overflow-hidden shadow-md profil-photo-frame">
      <div class="aspect-[3/4] overflow-hidden">
        <img src="{{ asset('images/kepala-sekolah.jpg') }}" alt="Kepala Sekolah SMKN 4 Bogor"
             class="w-full h-full object-cover"
             onerror="this.style.display='none'">
      </div>
      <div class="text-white text-center py-3 font-bold text-sm profil-photo-caption">
        Drs. Mulya Murprihartono, M.Si
        <p class="text-xs font-normal text-white/70 mt-0.5">Kepala SMKN 4 Kota Bogor</p>
      </div>
    </div>
  </div>

  {{-- Teks sambutan dengan tanda kutip dekoratif --}}
  <div class="relative bg-white rounded-2xl shadow-md p-8 pt-10 flex-1">
    <span class="absolute top-4 left-6 text-5xl font-serif leading-none text-blue-100 select-none">&ldquo;</span>

    <p class="leading-relaxed font-medium" style="color: var(--navy);">
      <strong>Selamat datang di website resmi SMK Negeri 4 Bogor.</strong>
    </p>
    <p class="text-gray-600 leading-relaxed mt-3">
      Website ini menjadi sarana informasi mengenai profil sekolah, program,
      prestasi, dan berbagai kegiatan sekolah.
    </p>
    <p class="text-gray-600 leading-relaxed mt-3">
      Semoga informasi yang kami sajikan bermanfaat serta mempererat
      komunikasi antara sekolah dan masyarakat.
    </p>
    <p class="text-gray-600 leading-relaxed mt-3">
      Terima kasih atas kunjungan Anda.
    </p>

    <div class="w-10 h-1 bg-blue-100 rounded-full mt-5"></div>
    <span class="absolute bottom-4 right-6 text-5xl font-serif leading-none text-blue-100 select-none">&rdquo;</span>
  </div>
</section>

{{-- ========== TENTANG SMKN 4 BOGOR ========== --}}
<section class="bg-gray-50 py-16">
  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

    {{-- Foto kiri --}}
    <div class="rounded-2xl overflow-hidden shadow-lg aspect-[4/3] placeholder-img">
      <img src="{{ asset('images/sejarah-sekolah.jpg') }}" alt="Fasilitas SMKN 4 Bogor"
           class="w-full h-full object-cover"
           onerror="this.style.display='none'">
    </div>

    {{-- Teks + kotak info kanan --}}
    <div>
      <h2 class="text-2xl md:text-3xl font-extrabold mb-4" style="color: var(--navy);">
        Tentang SMKN 4 Bogor
      </h2>
      <p class="text-gray-600 leading-relaxed">
        SMK Negeri 4 Bogor didirikan pada tahun 2008 dan resmi beroperasi pada
        2009. Berlokasi di Jl. Muarasari, Bogor Selatan, sekolah ini terus
        berkomitmen mencetak lulusan yang kompeten, berkarakter, dan siap
        menghadapi dunia kerja maupun pendidikan lanjutan.
      </p>
    </div>

  </div>
</section>

{{-- ========== FASILITAS SEKOLAH ========== --}}
<section class="max-w-5xl mx-auto px-6 py-16">

  <h2 class="text-xl md:text-2xl font-extrabold text-center mb-10" style="color: var(--navy);">
    Fasilitas Sekolah
  </h2>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

    {{-- Lab Komputer --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 text-left">
      <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <rect x="3" y="4" width="18" height="12" rx="2"/>
          <path d="M8 20h8M12 16v4"/>
        </svg>
      </div>
      <p class="font-bold text-sm mb-1" style="color: var(--navy);">Lab Komputer</p>
      <p class="text-xs text-gray-500 leading-relaxed">
        Dilengkapi dengan komputer spesifikasi terkini untuk mendukung pembelajaran IT yang optimal.
      </p>
    </div>

    {{-- Bengkel Praktik --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 text-left">
      <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 005.4-5.4l-2.6 2.6-2.4-.6-.6-2.4 2.6-2.6z"/>
        </svg>
      </div>
      <p class="font-bold text-sm mb-1" style="color: var(--navy);">Bengkel Praktik</p>
      <p class="text-xs text-gray-500 leading-relaxed">
        Ruang kerja yang dirancang menyerupai standar industri untuk melatih keterampilan teknis siswa.
      </p>
    </div>

    {{-- Perpustakaan --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 text-left">
      <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <path d="M12 6c-2-1.5-5-2-8-2v14c3 0 6 .5 8 2 2-1.5 5-2 8-2V4c-3 0-6 .5-8 2z"/>
          <path d="M12 6v14"/>
        </svg>
      </div>
      <p class="font-bold text-sm mb-1" style="color: var(--navy);">Perpustakaan</p>
      <p class="text-xs text-gray-500 leading-relaxed">
        Koleksi buku yang lengkap dan area membaca yang nyaman untuk menunjang literasi siswa.
      </p>
    </div>

    {{-- Lapangan Olahraga --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 text-left">
      <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <circle cx="12" cy="12" r="9"/>
          <circle cx="12" cy="12" r="4"/>
          <path d="M12 3v4M12 17v4M3 12h4M17 12h4"/>
        </svg>
      </div>
      <p class="font-bold text-sm mb-1" style="color: var(--navy);">Lapangan Olahraga</p>
      <p class="text-xs text-gray-500 leading-relaxed">
        Fasilitas olahraga multifungsi untuk kegiatan jasmani, pertandingan, dan ekstrakurikuler.
      </p>
    </div>

    {{-- Masjid --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 text-left">
      <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <path d="M4 21V11a8 8 0 0116 0v10"/>
          <path d="M9 21v-5a3 3 0 016 0v5"/>
          <path d="M12 3v3"/>
        </svg>
      </div>
      <p class="font-bold text-sm mb-1" style="color: var(--navy);">Masjid</p>
      <p class="text-xs text-gray-500 leading-relaxed">
        Tempat ibadah yang luas dan nyaman untuk memfasilitasi kegiatan keagamaan warga sekolah.
      </p>
    </div>

    {{-- Ruang Kelas --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 text-left">
      <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <rect x="3" y="3" width="18" height="18" rx="2"/>
          <path d="M3 12h18M12 3v18"/>
        </svg>
      </div>
      <p class="font-bold text-sm mb-1" style="color: var(--navy);">Ruang Kelas</p>
      <p class="text-xs text-gray-500 leading-relaxed">
        Ruang belajar ber-AC dengan fasilitas multimedia yang mendukung proses KBM yang interaktif.
      </p>
    </div>

  </div>
</section>

@endsection