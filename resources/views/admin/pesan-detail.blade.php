{{-- GANTI SELURUH ISI FILE INI (file blade "Detail & Balas Pesan" kamu) DENGAN YANG DI BAWAH --}}
@extends('layouts.admin')

@section('title', 'Detail & Balas Pesan - Admin SMKN 4 Bogor')

@section('content')

{{-- ========== BREADCRUMB + TOMBOL KEMBALI ========== --}}
<div class="flex items-center justify-between flex-wrap gap-3 mb-1">
  <div class="flex items-center gap-2 text-sm text-gray-400">
    <a href="{{ url('/dashboard') }}" class="hover:text-gray-600">Admin</a>
    <span>&rsaquo;</span>
    <a href="{{ route('admin.pesan.index') }}" class="hover:text-gray-600">Pesan Masuk</a>
    <span>&rsaquo;</span>
    <span class="text-gray-700 font-medium">Detail &amp; Balas Pesan</span>
  </div>

  <a href="{{ route('admin.pesan.index') }}"
     class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Kembali ke Daftar Pesan
  </a>
</div>

<h1 class="text-2xl font-extrabold mb-1" style="color:#1f2430;">Detail &amp; Balas Pesan</h1>
<p class="text-sm text-gray-400 mb-8">
  <a href="{{ url('/dashboard') }}" class="hover:text-gray-600">Dashboard</a>
  <span>&rsaquo;</span>
  <a href="{{ route('admin.pesan.index') }}" class="hover:text-gray-600">Pesan Masuk</a>
  <span>&rsaquo;</span>
</p>

@if (session('success'))
  <div class="mb-6 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3">
    {{ session('success') }}
  </div>
@endif
@if (session('warning'))
  <div class="mb-6 rounded-lg bg-amber-50 border border-amber-200 text-amber-700 text-sm px-4 py-3">
    {{ session('warning') }}
  </div>
@endif

<div class="grid lg:grid-cols-[380px_1fr] gap-6 items-start">

  {{-- ========== KIRI: PESAN MASUK ========== --}}
  <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
    <div class="flex items-center justify-between mb-5">
      <p class="text-xs font-bold uppercase text-gray-400">Pesan Masuk</p>
      <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-600">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Dibaca
      </span>
    </div>

    <div class="mb-4">
      <p class="text-xs font-bold uppercase text-gray-400 mb-1">Nama</p>
      <p class="text-sm font-semibold" style="color:#1f2430;">{{ $pesan->nama }}</p>
    </div>

    <div class="mb-4">
      <p class="text-xs font-bold uppercase text-gray-400 mb-1">Email</p>
      <p class="text-sm" style="color:#1f2430;">{{ $pesan->email }}</p>
    </div>

    <div class="mb-4">
      <p class="text-xs font-bold uppercase text-gray-400 mb-1">Subjek</p>
      <div class="border border-gray-200 rounded-lg px-3 py-2.5 bg-gray-50 text-sm" style="color:#1f2430;">
        {{ $pesan->subjek }}
      </div>
    </div>

    <div class="mb-6">
      <p class="text-xs font-bold uppercase text-gray-400 mb-1">Isi Pesan</p>
      <div class="border border-gray-200 rounded-lg px-3 py-3 bg-gray-50 text-sm leading-relaxed min-h-[160px] whitespace-pre-line" style="color:#374151;">
        {{ $pesan->pesan }}
      </div>
    </div>

    @if ($pesan->balasans->count())
      <div class="mb-6">
        <p class="text-xs font-bold uppercase text-gray-400 mb-2">Riwayat Balasan</p>
        <div class="space-y-3">
          @foreach ($pesan->balasans as $balasan)
            <div class="border border-gray-100 rounded-lg p-3 bg-blue-50/40">
              <div class="mb-1">
                <p class="text-xs font-semibold" style="color:#1f2430;">{{ $balasan->subjek }}</p>
              </div>
              <p class="text-xs text-gray-500 leading-relaxed line-clamp-3">{{ $balasan->isi }}</p>
              <p class="text-[10px] text-gray-400 mt-1">{{ $balasan->created_at->translatedFormat('d M Y, H:i') }}</p>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
      <p class="text-xs text-gray-400">IP: {{ $pesan->ip_address ?? 'Tidak tercatat' }}</p>
      <form action="{{ route('admin.pesan.destroy', $pesan->id) }}" method="POST"
            onsubmit="return confirm('Yakin mau hapus pesan ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-flex items-center gap-1.5 text-xs font-semibold text-red-500 hover:text-red-600">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-3.5 h-3.5">
            <path d="M3 6h18"/><path d="M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
          </svg>
          Hapus Pesan
        </button>
      </form>
    </div>
  </div>

  {{-- ========== KANAN: FORM BALAS PESAN ========== --}}
  <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
    <h2 class="text-lg font-extrabold mb-1" style="color:#1f2430;">Formulir Balas Pesan</h2>
    <p class="text-sm text-gray-500 mb-6">Kirim tanggapan langsung ke surel pengirim melalui server SMTP sekolah.</p>

    <form action="{{ route('admin.pesan.reply', $pesan->id) }}" method="POST">
      @csrf

      <div class="grid md:grid-cols-2 gap-5 mb-5">
        <div>
          <label class="block text-sm font-semibold mb-2" style="color:#1f2430;">Penerima (To)</label>
          <div class="relative">
            <input type="text" value="{{ $pesan->email }}" readonly
                   class="w-full border border-gray-200 bg-gray-50 rounded-lg px-4 py-2.5 text-sm text-gray-500 cursor-not-allowed">
            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[10px] bg-gray-200 text-gray-500 px-2 py-0.5 rounded-full">Terkunci</span>
          </div>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-2" style="color:#1f2430;">Kirim Sebagai (From)</label>
          <div class="border border-gray-200 bg-gray-50 rounded-lg px-4 py-2.5 text-sm text-gray-500">
            Humas &amp; Informasi SMKN 4 Bogor
          </div>
        </div>
      </div>

      <div class="mb-5">
        <label class="block text-sm font-semibold mb-2" style="color:#1f2430;">Subjek Email Balasan</label>
        <input type="text" name="subjek" value="{{ old('subjek', 'Re: ' . $pesan->subjek) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">
      </div>

      <div class="mb-2">
        <label class="block text-sm font-semibold mb-2" style="color:#1f2430;">Isi Pesan Balasan</label>
        <div class="border border-gray-300 rounded-lg overflow-hidden">
          <div class="flex items-center justify-between px-3 py-2 bg-gray-50 border-b border-gray-300">
            <div class="flex items-center gap-3 text-gray-400">
              <b class="cursor-default text-sm">B</b>
              <i class="cursor-default text-sm">I</i>
              <u class="cursor-default text-sm">U</u>
              <span class="w-px h-4 bg-gray-300"></span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4"><path d="M10 13a5 5 0 007.07 0l1.93-1.93a5 5 0 00-7.07-7.07L10 5"/><path d="M14 11a5 5 0 00-7.07 0l-1.93 1.93a5 5 0 007.07 7.07L14 19"/></svg>
            </div>
            <span class="text-xs text-gray-400 italic">Format HTML belum didukung</span>
          </div>
          <textarea name="isi" rows="8" placeholder="Tulis balasan untuk {{ $pesan->nama }} di sini..."
                    class="w-full px-4 py-3 text-sm focus:outline-none resize-none">{{ old('isi') }}</textarea>
        </div>
      </div>

      <div class="flex items-center justify-between mt-7">
        <div class="flex items-center gap-3">
          <a href="{{ route('admin.pesan.index') }}"
             class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition">
            Batal
          </a>
        </div>
        <button type="submit"
                class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
            <path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4 20-7z"/>
          </svg>
          Kirim Balasan Sekarang
        </button>
      </div>

    </form>
  </div>

</div>

@endsection