<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('tanggal');
        });

        // Isi awal deskripsi untuk berita yang sudah ada (bisa diedit lewat halaman admin)
        $isiAwal = [
            'Classmeeting Day 5' => 'KEGIATAN CLASS MEETING DAY 5. KEGIATAN INI DILAKSANAKAN DI SMK NEGERI 4 BOGOR PADA HARI RABU, 24 JUNI 2026.',
            'Kegiatan Sertifikasi Bahasa Inggris (TOEIC)' => 'KEGIATAN PROGRAM SERTIFIKASI BAHASA INGGRIS (TOEIC), DILAKSANAKAN DI LAB SMKN 4 BOGOR. PADA HARI RABU, 5 AGUSTUS 2026.',
            'SMKN 4 Bogor Peduli Lingkungan' => 'KEGIATAN SMKN 4 BOGOR PEDULI LINGKUNGAN, KEGIATAN INI DILAKUKAN DENGAN MEMBERSIHKAN SAMPAH DI LINGKUNGAN SUNGAI YANG DILAKSANAKAN DI JEMBATAN GARUDA KENCANA MERAH PUTIH MUARASARI KEC. BOGOR SELATAN KOTA BOGOR PADA HARI JUMAT, 24 JULI 2026.',
            'MPLS Hari Pertama SMKN 4 Bogor' => 'KEGIATAN MPLS HARI PERTAMA SMKN 4 BOGOR. PADA HARI RABU, 15 JULI 2026.',
            'Kelulusan & Perpisahan 2025/2026' => 'TASYAKURAN & PERPISAHAN SISWA-SISWI SMKN 4 BOGOR TAHUN AJARAN 2025/2026. PADA HARI KAMIS, 21 MEI 2026 DI LAPANGAN SMKN 4 BOGOR.',
            'Lolos ENBP 2026' => 'SELAMAT UNTUK SISWA-SISWI SMKN 4 BOGOR YANG BERHASIL LOLOS SNBP 2026!',
        ];

        foreach ($isiAwal as $judul => $teks) {
            DB::table('beritas')->where('judul', $judul)->update(['deskripsi' => $teks]);
        }
    }

    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};