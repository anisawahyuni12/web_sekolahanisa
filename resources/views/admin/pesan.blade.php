@extends('layouts.admin')

@section('title', 'Kelola Pesan - Admin SMKN 4 Bogor')

@section('content')

<div class="admin-topbar">
  <span class="admin-tab-active">Kontak</span>
</div>

<p class="admin-page-subtitle">Daftar pesan yang dikirim pengunjung lewat halaman Kontak.</p>

@if (session('success'))
  <div class="mb-4 rounded-lg bg-green-50 text-green-700 text-sm px-4 py-3">
    {{ session('success') }}
  </div>
@endif

<div class="admin-table-card">
  <table class="admin-table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Subjek</th>
        <th>Pesan</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pesanList as $pesan)
        <tr>
          <td>
            <p class="admin-table-nama">{{ $pesan->nama }}</p>
          </td>
          <td>{{ $pesan->email }}</td>
          <td>{{ $pesan->subjek }}</td>
          <td style="max-width: 220px;">
            <a href="{{ route('admin.pesan.show', $pesan->id) }}" class="text-blue-600 hover:underline text-sm">
              {{ \Illuminate\Support\Str::limit($pesan->pesan, 40) }}
            </a>
          </td>
          <td>
            {{ $pesan->created_at->translatedFormat('d M Y, H:i') }}
          </td>
          <td>
            @if ($pesan->balasans_count > 0)
              <span class="inline-block text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full">Sudah Dibalas</span>
            @else
              <span class="inline-block text-[11px] font-semibold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-full">Belum Dibalas</span>
            @endif
          </td>
          <td>
            <div class="flex gap-2">
              <a href="{{ route('admin.pesan.show', $pesan->id) }}" class="admin-action-btn" title="Lihat & Balas">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
                  <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
              </a>

              <form action="{{ route('admin.pesan.destroy', $pesan->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus pesan ini?');" style="display:inline;">
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
          <td colspan="7" class="text-center text-gray-400 py-10">Belum ada pesan masuk.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection