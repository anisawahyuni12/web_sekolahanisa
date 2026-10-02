@extends('layouts.admin')

@section('title', 'Dashboard - Admin SMKN 4 Bogor')

@section('content')

<div class="admin-topbar">
  <span class="admin-tab-active">Dashboard</span>
</div>

<h1 class="text-2xl font-extrabold mb-1" style="color: #1f2430;">Halo, Admin</h1>
<p class="text-gray-500 mb-8">Berikut ringkasan aktivitas sekolah hari ini.</p>

{{-- ========== KARTU STATISTIK (dari database) ========== --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

  <div class="admin-stat-card">
    <div class="flex items-center justify-between mb-4">
      <span class="admin-stat-label">JUMLAH ARTIKEL</span>
      <div class="admin-stat-icon stat-icon-blue" style="color:#2b4ee0;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <path d="M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z"/>
          <path d="M14 3v5h5"/>
          <path d="M9 13h6M9 16h6M9 10h3"/>
        </svg>
      </div>
    </div>
    <p class="admin-stat-number stat-counter" data-target="{{ $jumlahArtikel }}">0</p>
  </div>

  <div class="admin-stat-card">
    <div class="flex items-center justify-between mb-4">
      <span class="admin-stat-label">JUMLAH PRODUK</span>
      <div class="admin-stat-icon stat-icon-orange" style="color:#e0752c;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <path d="M21 8L12 3 3 8v8l9 5 9-5V8z"/>
          <path d="M3 8l9 5 9-5"/>
          <path d="M12 13v8"/>
        </svg>
      </div>
    </div>
    <p class="admin-stat-number stat-counter" data-target="{{ $jumlahProduk }}">0</p>
  </div>

  <div class="admin-stat-card">
    <div class="flex items-center justify-between mb-4">
      <span class="admin-stat-label">JUMLAH GALERI</span>
      <div class="admin-stat-icon stat-icon-teal" style="color:#0f9d72;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <rect x="3" y="4" width="18" height="16" rx="2"/>
          <circle cx="8.5" cy="9.5" r="1.5"/>
          <path d="M21 16l-5.5-5.5L9 17"/>
        </svg>
      </div>
    </div>
    <p class="admin-stat-number stat-counter" data-target="{{ $jumlahGaleri }}">0</p>
  </div>

  <div class="admin-stat-card">
    <div class="flex items-center justify-between mb-4">
      <span class="admin-stat-label">EKSTRAKURIKULER</span>
      <div class="admin-stat-icon stat-icon-purple" style="color:#7c3aed;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
          <circle cx="9" cy="8" r="3"/>
          <path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/>
          <circle cx="17" cy="9" r="2.5"/>
          <path d="M15 14.2c2.9.5 5 2.6 5 5.8"/>
        </svg>
      </div>
    </div>
    <p class="admin-stat-number stat-counter" data-target="{{ $jumlahEkskul }}">0</p>
  </div>

</div>

{{-- ========== AKTIVITAS TERKINI (dari database) ========== --}}
@php
  $ikonPath = [
    'artikel' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>',
    'galeri'  => '<rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M21 16l-5.5-5.5L9 17"/>',
    'produk'  => '<path d="M21 8L12 3 3 8v8l9 5 9-5V8z"/><path d="M3 8l9 5 9-5"/><path d="M12 13v8"/>',
    'ekskul'  => '<circle cx="9" cy="8" r="3"/><path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/><circle cx="17" cy="9" r="2.5"/><path d="M15 14.2c2.9.5 5 2.6 5 5.8"/>',
  ];
  $ikonWarna = [
    'artikel' => 'background:#e8edff; color:#2b4ee0;',
    'galeri'  => 'background:#dcf5ec; color:#0f9d72;',
    'produk'  => 'background:#fdeadb; color:#e0752c;',
    'ekskul'  => 'background:#f0e8ff; color:#7c3aed;',
  ];
@endphp

<div class="admin-activity-card">
  <div class="flex items-center justify-between mb-2">
    <h2 class="text-lg font-extrabold" style="color: #1f2430;">Aktivitas Terkini</h2>
  </div>

  @if ($aktivitas->isEmpty())
    <p class="text-gray-400 text-sm py-6">Belum ada aktivitas.</p>
  @else
    <div class="timeline-wrap">
      <div class="timeline-line"></div>

      @foreach ($aktivitas as $item)
        <div class="timeline-row">

          @if ($loop->odd)
            <div></div>
            <div class="timeline-icon" style="{{ $ikonWarna[$item['tipe']] }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">{!! $ikonPath[$item['tipe']] !!}</svg>
            </div>
            <div class="timeline-box">
              <p>{{ $item['aksi'] }}</p>
              <p class="timeline-title">"{{ $item['judul'] }}"</p>
              <p class="timeline-time">{{ $item['waktu']->locale('id')->diffForHumans() }}</p>
            </div>
          @else
            <div class="timeline-box">
              <p>{{ $item['aksi'] }}</p>
              <p class="timeline-title">"{{ $item['judul'] }}"</p>
              <p class="timeline-time">{{ $item['waktu']->locale('id')->diffForHumans() }}</p>
            </div>
            <div class="timeline-icon" style="{{ $ikonWarna[$item['tipe']] }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">{!! $ikonPath[$item['tipe']] !!}</svg>
            </div>
            <div></div>
          @endif

        </div>
      @endforeach

    </div>
  @endif
</div>

@endsection