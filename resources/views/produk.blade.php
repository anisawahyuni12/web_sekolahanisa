@extends('layouts.app')

@section('title', 'Produk - SMKN 4 Bogor')

@section('content')

{{-- ========== BANNER PRODUK ========== --}}
<section class="relative overflow-hidden produk-hero flex items-center">
  <img src="{{ asset('images/produk-banner.jpg') }}" alt="SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover"
       onerror="this.style.display='none'">
  <div class="absolute inset-0 bg-black/50"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 w-full">
   
    <h1 class="text-white font-extrabold mb-4" style="font-size: clamp(2rem, 5vw, 3rem); line-height: 1.15;">
      Koperasi<br>&amp; Atribut
    </h1>
    <p class="text-white/80 max-w-xl leading-relaxed">
      Lengkapi kebutuhan akademik dan identitas sekolah Anda melalui layanan
      koperasi digital resmi SMK Negeri 4 Bogor. Belanja mudah, cepat, dan
      terpercaya.
    </p>
  </div>
</section>

{{-- ========== GRID PRODUK (diambil dari database) ========== --}}
<section class="max-w-7xl mx-auto px-6 py-16">
  <div class="flex flex-wrap justify-center gap-6">

    @forelse ($produkList as $produk)
      <div class="produk-card w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)]">
        <div class="aspect-square produk-img-box flex items-center justify-center placeholder-img">
          <img src="{{ asset('images/' . $produk->foto) }}" alt="{{ $produk->nama }}"
               class="w-full h-full object-contain p-6" onerror="this.style.display='none'">
        </div>
        <div class="p-4">
          <p class="produk-kategori mb-1">{{ strtoupper($produk->kategori) }}</p>
          <h3 class="font-bold mb-2" style="color: var(--navy);">{{ $produk->nama }}</h3>
          <p class="font-extrabold produk-harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
          <p class="produk-stok">{{ $produk->tersedia ? 'Tersedia' : 'Habis' }}</p>
        </div>
      </div>
    @empty
      <p class="text-center text-gray-400 py-16">Belum ada produk.</p>
    @endforelse

  </div>
</section>

@endsection