@extends('layouts.admin')

@section('title', isset($ekskul) ? 'Edit Ekstrakurikuler - Admin SMKN 4 Bogor' : 'Tambah Ekstrakurikuler - Admin SMKN 4 Bogor')

@section('content')

{{-- ========== BREADCRUMB ========== --}}
<div class="flex items-center gap-2 text-sm text-gray-400 mb-6">
  <a href="{{ url('/dashboard') }}" class="hover:text-gray-600">Dashboard</a>
  <span>&rsaquo;</span>
  <a href="{{ route('admin.ekstrakurikuler.index') }}" class="hover:text-gray-600">Ekstrakurikuler</a>
  <span>&rsaquo;</span>
  <span class="text-gray-700 font-medium">{{ isset($ekskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler' }}</span>
</div>

<h1 class="text-2xl font-extrabold mb-1" style="color:#1f2430;">
  {{ isset($ekskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler Baru' }}
</h1>
<p class="text-gray-500 mb-8">
  Masukkan informasi detail kegiatan ekstrakurikuler sekolah untuk dipublikasikan.
</p>

@if ($errors->any())
  <div class="mb-6 rounded-lg bg-red-50 text-red-700 text-sm px-4 py-3">
    <ul class="list-disc pl-5 space-y-1">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
  <form action="{{ isset($ekskul) ? route('admin.ekstrakurikuler.update', $ekskul->id) : route('admin.ekstrakurikuler.store') }}"
        method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($ekskul))
      @method('PUT')
    @endif

    <div class="grid md:grid-cols-2 gap-8">

      {{-- ===== UPLOAD FOTO ===== --}}
      <div>
        <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Foto / Logo Ekstrakurikuler</label>

        <label for="fotoInput" id="dropZone"
               class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-xl h-64 cursor-pointer hover:border-blue-400 transition text-center px-4">

          <div id="uploadPlaceholder" class="{{ isset($ekskul) && $ekskul->foto ? 'hidden' : '' }}">
            <div class="mx-auto mb-3 w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
                <path d="M12 16V4M12 4l-4 4M12 4l4 4"/>
                <path d="M4 16v3a2 2 0 002 2h12a2 2 0 002-2v-3"/>
              </svg>
            </div>
            <p class="text-sm">
              <span class="text-blue-600 font-medium">Upload a file</span>
              <span class="text-gray-500">or drag and drop</span>
            </p>
            <p class="text-xs text-gray-400 mt-1">JPG, PNG, WEBP up to 2MB</p>
          </div>

          <img id="previewImg"
               src="{{ isset($ekskul) && $ekskul->foto ? asset('images/' . $ekskul->foto) : '' }}"
               class="h-full object-contain {{ isset($ekskul) && $ekskul->foto ? '' : 'hidden' }}">
        </label>

        <input type="file" name="foto" id="fotoInput" accept=".jpg,.jpeg,.png,.webp" class="hidden">
      </div>

      {{-- ===== FIELD KANAN ===== --}}
      <div class="flex flex-col gap-5">
        <div>
          <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Nama Ekstrakurikuler</label>
          <input type="text" name="nama" value="{{ old('nama', $ekskul->nama ?? '') }}"
                 placeholder="Contoh: Pramuka, Paskibra, Futsal, Rohis"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">
        </div>

        <div>
          <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Kategori (untuk label di halaman publik)</label>
          <select name="kategori"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">
            @foreach (['Olahraga', 'Kepemimpinan', 'Nasionalisme', 'Kemanusiaan', 'Bela Diri', 'Keagamaan', 'Kesenian', 'Lainnya'] as $katOption)
              <option value="{{ $katOption }}" {{ (old('kategori', $ekskul->kategori ?? '') == $katOption) ? 'selected' : '' }}>
                {{ $katOption }}
              </option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Tipe</label>
          <select name="tipe"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">
            @foreach (['Pilihan', 'Wajib'] as $tipeOption)
              <option value="{{ $tipeOption }}" {{ (old('tipe', $ekskul->tipe ?? 'Pilihan') == $tipeOption) ? 'selected' : '' }}>
                {{ $tipeOption }}
              </option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Pembina / Pelatih</label>
          <input type="text" name="pembina" value="{{ old('pembina', $ekskul->pembina ?? '') }}"
                 placeholder="Contoh: Bpk. Ahmad Subarjo, S.Pd"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">
        </div>

        <div>
          <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Jadwal Latihan</label>
          <input type="text" name="hari_latihan" value="{{ old('hari_latihan', $ekskul->hari_latihan ?? '') }}"
                 placeholder="Contoh: Setiap Jumat, 15.30 - 17.00"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">
        </div>
      </div>
    </div>

    {{-- ===== DESKRIPSI ===== --}}
    <div class="mt-8">
      <label class="block font-bold text-sm mb-2" style="color:#1f2430;">Deskripsi &amp; Profil Kegiatan</label>
      <div class="border border-gray-300 rounded-lg overflow-hidden">
        <div class="flex items-center gap-3 px-3 py-2 bg-gray-50 border-b border-gray-300 text-gray-400">
          <b class="cursor-default text-sm">B</b>
          <i class="cursor-default text-sm">I</i>
          <u class="cursor-default text-sm">U</u>
          <span class="w-px h-4 bg-gray-300"></span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
            <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
          </svg>
        </div>
        <textarea name="deskripsi" rows="6" placeholder="Tulis deskripsi lengkap mengenai kegiatan ekstrakurikuler, visi misi, dan prestasi di sini..."
                  class="w-full px-4 py-3 text-sm focus:outline-none resize-none">{{ old('deskripsi', $ekskul->deskripsi ?? '') }}</textarea>
      </div>
    </div>

    {{-- ===== TOMBOL ===== --}}
    <div class="flex justify-end gap-3 mt-8">
      <a href="{{ route('admin.ekstrakurikuler.index') }}"
         class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition">
        Batal
      </a>
      <button type="submit"
              class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-4 h-4">
          <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
          <path d="M17 21v-8H7v8M7 3v5h8"/>
        </svg>
        {{ isset($ekskul) ? 'Simpan Perubahan' : 'Simpan Ekstrakurikuler' }}
      </button>
    </div>

  </form>
</div>

<script>
  const fotoInput = document.getElementById('fotoInput');
  const dropZone = document.getElementById('dropZone');
  const previewImg = document.getElementById('previewImg');
  const uploadPlaceholder = document.getElementById('uploadPlaceholder');

  dropZone.addEventListener('click', () => fotoInput.click());

  fotoInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const url = URL.createObjectURL(file);
      previewImg.src = url;
      previewImg.classList.remove('hidden');
      uploadPlaceholder.classList.add('hidden');
    }
  });
</script>

@endsection