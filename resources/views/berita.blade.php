@extends('layouts.app')

@section('title', 'Berita - SMKN 4 Bogor')

@section('content')

{{-- ========== BANNER ARTIKEL SEKOLAH ========== --}}
<section class="relative overflow-hidden hero-bg berita-hero">
  <img src="{{ asset('images/berita-banner.jpg') }}" alt="Gedung SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover"
       onerror="this.style.display='none'">
  <div class="absolute inset-0 bg-black/55"></div>
  <div class="absolute inset-0 flex items-center">
    <div class="w-full" style="padding-left: 1rem;">
      <h1 class="text-white font-extrabold mb-4"
          style="font-size: clamp(2rem, 5vw, 3.5rem); text-shadow: 0 2px 12px rgba(0,0,0,.3);">
        Berita Sekolah
      </h1>
      <p class="text-white/85 leading-relaxed max-w-2xl" style="font-size: 1rem;">
        Informasi dan berita terkini seputar kegiatan sekolah dan program di
        SMK Negeri 4 Bogor.
      </p>
    </div>
  </div>
</section>

{{-- ========== GRID BERITA (diambil dari database) ========== --}}
<section class="max-w-7xl mx-auto px-6 pt-10 pb-16">
  <div class="grid md:grid-cols-2 gap-x-10 gap-y-8">

    @forelse ($beritaList as $berita)
      <article class="rounded-2xl border border-gray-200 bg-white p-3 shadow-sm hover:shadow-md transition">
        <div class="relative aspect-[4/3] rounded-xl overflow-hidden news-badge">
          <img src="{{ asset('images/' . $berita->foto) }}" alt="{{ $berita->judul }}"
               class="w-full h-full object-cover news-card-img" onerror="this.style.display='none'">
          <div class="absolute inset-0 news-gradient-overlay"></div>
          <div class="absolute bottom-4 left-5 right-5 text-white">
            <p class="italic text-sm mb-1 news-script-text">{{ $berita->kategori }}</p>
            <p class="font-extrabold text-lg leading-snug">{{ $berita->judul }}</p>
          </div>
        </div>
        <div class="px-2 pt-4 pb-2">
          <p class="text-base text-gray-600 leading-relaxed uppercase">{{ $berita->deskripsi }}</p>
        </div>
      </article>
    @empty
      <p class="md:col-span-2 text-center text-gray-400 py-16">Belum ada berita.</p>
    @endforelse

  </div>
</section>

@endsection