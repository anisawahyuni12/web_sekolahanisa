@extends('layouts.admin')

@section('title', 'Kelola Galeri - Admin SMKN 4 Bogor')

@section('content')

<div class="admin-topbar">
  <span class="admin-tab-active">Kelola Galeri</span>
</div>

<div class="flex items-center justify-between flex-wrap gap-3">
  <p class="admin-page-subtitle">Kelola aset galeri dan dokumentasi kegiatan sekolah.</p>
  <a href="{{ route('admin.galeri.create') }}"
     class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path d="M12 5v14M5 12h14"/></svg>
    Tambah Galeri
  </a>
</div>

@if (session('success'))
  <div class="mb-4 rounded-lg bg-green-50 text-green-700 text-sm px-4 py-3">
    {{ session('success') }}
  </div>
@endif

{{-- ========== TABEL GALERI ========== --}}
<div class="admin-table-card">
  <table class="admin-table">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($galeriList as $galeri)
        <tr>
          <td>
            <div class="admin-table-thumb placeholder-img">
              <img src="{{ asset('images/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
                   class="absolute inset-0 w-full h-full object-cover" onerror="this.style.display='none'">
            </div>
          </td>
          <td>
            <p class="admin-table-nama">{{ $galeri->judul }}</p>
          </td>
          <td>
            <span class="admin-badge-kategori">{{ $galeri->kategori }}</span>
          </td>
          <td>
            {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d M Y') }}
          </td>
          <td>
            <div class="flex gap-2">
              <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="admin-action-btn" title="Edit">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
                  <path d="M12 20h9"/>
                  <path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                </svg>
              </a>
              <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus foto ini?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-action-btn danger" title="Hapus">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
                    <path d="M3 6h18"/>
                    <path d="M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                    <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                    <path d="M10 11v6M14 11v6"/>
                  </svg>
                </button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center text-gray-400 py-10">Belum ada foto galeri.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

</div>

@endsection