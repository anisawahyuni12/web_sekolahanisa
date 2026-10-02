@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMKN 4 Bogor')

@section('content')

{{-- ========== BANNER EKSTRAKURIKULER ========== --}}
<section class="relative overflow-hidden ekskul-hero placeholder-img">
  <img src="{{ asset('images/ekstrakurikuler-banner.jpg') }}" alt="Kegiatan siswa SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover"
       onerror="this.style.display='none'">
  <div class="absolute inset-0 ekskul-hero-overlay"></div>
</section>

{{-- ========== JUDUL & DESKRIPSI ========== --}}
<section class="max-w-7xl mx-auto px-6 pt-10 pb-4">
  <p class="text-sm text-gray-400 mb-2">Beranda &gt; Ekstrakurikuler</p>
  <h1 class="text-3xl md:text-4xl font-extrabold mb-3" style="color: var(--navy);">Ekstrakurikuler</h1>
  <p class="text-gray-500 max-w-2xl">
    Wadah pengembangan bakat, minat, dan karakter siswa SMKN 4 Bogor melalui
    berbagai kegiatan positif dan berprestasi.
  </p>
</section>

{{-- ========== GRID EKSTRAKURIKULER (diambil dari database) ========== --}}
<section class="max-w-7xl mx-auto px-6 pb-16">
  @php
    // pemetaan nama kategori -> class badge warna yang sudah ada di css
    $badgeClass = [
      'Olahraga'     => 'badge-olahraga',
      'Kepemimpinan' => 'badge-kepemimpinan',
      'Nasionalisme' => 'badge-nasionalisme',
      'Kemanusiaan'  => 'badge-kemanusiaan',
      'Bela Diri'    => 'badge-beladiri',
      'Keagamaan'    => 'badge-keagamaan',
      'Kesenian'     => 'badge-kesenian',
    ];
  @endphp

  <div class="grid md:grid-cols-2 gap-6">

    @forelse ($ekskulList as $ekskul)
      <div class="ekskul-card bg-white">
        <div class="aspect-video placeholder-img">
          <img src="{{ asset('images/' . $ekskul->foto) }}" alt="{{ $ekskul->nama }}"
               class="w-full h-full object-cover" onerror="this.style.display='none'">
        </div>
        <div class="p-5">
          <span class="ekskul-badge {{ $badgeClass[$ekskul->kategori] ?? 'badge-olahraga' }} mb-2">
            {{ strtoupper($ekskul->kategori) }}
          </span>
          <h3 class="text-lg font-extrabold mt-2 mb-1" style="color: var(--navy);">{{ $ekskul->nama }}</h3>
          <p class="text-sm text-gray-500 leading-relaxed mb-3">
            {{ $ekskul->deskripsi }}
          </p>
          <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-400 border-t border-gray-100 pt-3">
            <span class="flex items-center gap-1">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-3.5 h-3.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/></svg>
              Pembina: {{ $ekskul->pembina }}
            </span>
            <span class="flex items-center gap-1">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-3.5 h-3.5"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
              {{ $ekskul->hari_latihan }}
            </span>
          </div>
        </div>
      </div>
    @empty
      <p class="md:col-span-2 text-center text-gray-400 py-16">Belum ada data ekstrakurikuler.</p>
    @endforelse

  </div>
</section>

@endsection