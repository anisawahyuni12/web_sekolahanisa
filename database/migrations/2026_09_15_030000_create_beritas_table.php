<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('judul');
            $table->string('kategori')->default('Kegiatan');
            $table->date('tanggal');
            $table->timestamps();
        });

        DB::table('beritas')->insert([
            ['foto' => 'artikel-1.jpg', 'judul' => 'Classmeet Day 5', 'kategori' => 'Kegiatan', 'tanggal' => '2026-06-24', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'artikel-2.jpg', 'judul' => 'Kegiatan Sertifikasi Bahasa Inggris (TOEIC)', 'kategori' => 'Kegiatan', 'tanggal' => '2026-07-05', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'artikel-3.jpg', 'judul' => 'SMKN 4 Bogor Peduli Lingkungan', 'kategori' => 'Kegiatan', 'tanggal' => '2026-07-24', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'artikel-4.jpg', 'judul' => 'MPLS Hari Pertama SMKN 4 Bogor', 'kategori' => 'Kegiatan', 'tanggal' => '2026-07-15', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'artikel-5.jpg', 'judul' => 'Kelulusan & Perpisahan 2025/2026', 'kategori' => 'Kegiatan', 'tanggal' => '2026-05-21', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'artikel-6.jpg', 'judul' => 'Lolos ENBP 2026', 'kategori' => 'Kegiatan', 'tanggal' => '2026-08-01', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};