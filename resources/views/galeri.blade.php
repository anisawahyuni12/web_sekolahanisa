@extends('layouts.app')

@section('title', 'Galeri - SMKN 4 Bogor')

@section('content')

{{-- ========== BANNER GALERI ========== --}}
<section class="relative overflow-hidden galeri-hero flex items-center">
  <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-2 gap-8 items-center w-full">
    <div>
      <h1 class="text-white font-extrabold mb-3" style="font-size: clamp(1.8rem, 4vw, 2.75rem);">
        Galeri Sekolah
      </h1>
      <p class="text-white/85 uppercase tracking-widest text-sm">
        Dokumentasi momen dan aktivitas SMKN 4 Bogor
      </p>
    </div>
    <div class="flex justify-center">
      <div class="galeri-frame w-full max-w-lg">
        <div class="w-full aspect-[16/9] placeholder-img overflow-hidden">
          <img src="{{ asset('images/galeri-hero.jpg') }}" alt="SMKN 4 Bogor"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'">
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ========== GRID GALERI (diambil dari database) ========== --}}
<section class="max-w-7xl mx-auto px-6 py-16">
  <div class="grid md:grid-cols-2 gap-6 items-start">

    @forelse ($galeriList as $galeri)
      <div class="galeri-card placeholder-img overflow-hidden" style="min-height: 150px;">
        <img src="{{ asset('images/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
             class="w-full h-auto block" onerror="this.style.display='none'">
      </div>
    @empty
      <p class="md:col-span-2 text-center text-gray-400 py-16">Belum ada foto galeri.</p>
    @endforelse

  </div>
</section>

@endsection