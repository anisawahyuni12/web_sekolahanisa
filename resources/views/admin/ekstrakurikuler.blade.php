@extends('layouts.admin')

@section('title', 'Kelola Ekstrakurikuler - Admin SMKN 4 Bogor')

@section('content')

<div class="admin-topbar">
  <span class="admin-tab-active">Kelola Ekstrakurikuler</span>
</div>

<div class="flex items-center justify-between flex-wrap gap-3">
  <p class="admin-page-subtitle">Kelola daftar ekstrakurikuler, pembina, dan jadwal latihan sekolah.</p>
  <a href="{{ route('admin.ekstrakurikuler.create') }}"
     class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path d="M12 5v14M5 12h14"/></svg>
    Tambah Ekstrakurikuler
  </a>
</div>

@if (session('success'))
  <div class="mb-4 rounded-lg bg-green-50 text-green-700 text-sm px-4 py-3">
    {{ session('success') }}
  </div>
@endif

{{-- ========== TABEL EKSTRAKURIKULER ========== --}}
<div class="admin-table-card">
  <table class="admin-table">
    <thead>
      <tr>
        <th>Logo/Foto</th>
        <th>Nama Ekstrakurikuler</th>
        <th>Pembina</th>
        <th>Hari Latihan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($ekskulList as $ekskul)
        <tr>
          <td>
            <div class="admin-table-thumb placeholder-img">
              <img src="{{ asset('images/' . $ekskul->foto) }}" alt="{{ $ekskul->nama }}"
                   class="absolute inset-0 w-full h-full object-cover" onerror="this.style.display='none'">
            </div>
          </td>
          <td>
            <p class="admin-table-nama">{{ $ekskul->nama }}</p>
            <p class="admin-table-deskripsi">{{ $ekskul->tipe }}</p>
          </td>
          <td>{{ $ekskul->pembina }}</td>
          <td>
            <span class="admin-badge-kategori">{{ $ekskul->hari_latihan }}</span>
          </td>
          <td>
            <div class="flex gap-2">
              <a href="{{ route('admin.ekstrakurikuler.edit', $ekskul->id) }}" class="admin-action-btn" title="Edit">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
                  <path d="M12 20h9"/>
                  <path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                </svg>
              </a>
              <form action="{{ route('admin.ekstrakurikuler.destroy', $ekskul->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus ekstrakurikuler ini?');" style="display:inline;">
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
          <td colspan="5" class="text-center text-gray-400 py-10">Belum ada data ekstrakurikuler.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection