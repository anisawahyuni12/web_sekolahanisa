@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin SMKN 4 Bogor')

@section('content')

<div class="admin-topbar">
  <span class="admin-tab-active">Kelola Produk</span>
</div>

<div class="flex items-center justify-between flex-wrap gap-3">
  <p class="admin-page-subtitle">Kelola daftar produk dan jasa karya siswa.</p>
  <a href="{{ route('admin.produk.create') }}"
     class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"><path d="M12 5v14M5 12h14"/></svg>
    Tambah Produk
  </a>
</div>

@if (session('success'))
  <div class="mb-4 rounded-lg bg-green-50 text-green-700 text-sm px-4 py-3">
    {{ session('success') }}
  </div>
@endif

{{-- ========== FILTER KATEGORI ========== --}}
<div class="mb-5">
  <select id="filterKategori" class="admin-filter-select" onchange="filterProduk(this.value)">
    <option value="semua">Semua Kategori</option>
    <option value="Umum">Umum</option>
    <option value="TPFL">TPFL</option>
    <option value="PPLG">PPLG</option>
    <option value="TJKT">TJKT</option>
    <option value="TKRO">TKRO</option>
  </select>
</div>

{{-- ========== TABEL PRODUK ========== --}}
<div class="admin-table-card">
  <table class="admin-table">
    <thead>
      <tr>
        <th>Foto Produk</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="tabelProduk">
      @forelse ($produkList as $produk)
        <tr data-kategori="{{ $produk->kategori }}">
          <td>
            <div class="admin-table-thumb placeholder-img">
              <img src="{{ asset('images/' . $produk->foto) }}" alt="{{ $produk->nama }}"
                   class="absolute inset-0 w-full h-full object-contain p-1" onerror="this.style.display='none'">
            </div>
          </td>
          <td>
            <p class="admin-table-nama">{{ $produk->nama }}</p>
            <p class="admin-table-deskripsi">{{ $produk->deskripsi }}</p>
          </td>
          <td>
            <span class="admin-badge-kategori">{{ $produk->kategori }}</span>
          </td>
          <td>
            <span class="admin-table-harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
          </td>
          <td>
            <span class="admin-status-dot"></span>
            <span class="admin-status-text">{{ $produk->tersedia ? 'Tersedia' : 'Habis' }}</span>
          </td>
          <td>
            <div class="flex gap-2">
              <a href="{{ route('admin.produk.edit', $produk->id) }}" class="admin-action-btn" title="Edit">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
                  <path d="M12 20h9"/>
                  <path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                </svg>
              </a>
              <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus produk ini?');" style="display:inline;">
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
          <td colspan="6" class="text-center text-gray-400 py-10">Belum ada produk.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <p id="pesanKosong" class="hidden text-center text-gray-400 py-10">
    Tidak ada produk untuk kategori ini.
  </p>
</div>

<script>
  function filterProduk(kategori) {
    const rows = document.querySelectorAll('#tabelProduk tr[data-kategori]');
    let adaYangTampil = false;

    rows.forEach(function (row) {
      const kategoriRow = row.getAttribute('data-kategori');
      const tampilkan = (kategori === 'semua' || kategoriRow === kategori);
      row.style.display = tampilkan ? '' : 'none';
      if (tampilkan) adaYangTampil = true;
    });

    document.getElementById('pesanKosong').classList.toggle('hidden', adaYangTampil);
  }
</script>

@endsection