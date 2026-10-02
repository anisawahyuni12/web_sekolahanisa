<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('judul');
            $table->string('kategori');
            $table->date('tanggal');
            $table->timestamps();
        });

        DB::table('galeris')->insert([
            ['foto' => 'galeri-1.jpg', 'judul' => 'Fashion World Competition Fruit Tea', 'kategori' => 'Kegiatan', 'tanggal' => '2023-10-12', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'galeri-2.jpg', 'judul' => 'Upacara Bendera Hari Senin', 'kategori' => 'Kegiatan', 'tanggal' => '2023-10-05', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'galeri-3.jpg', 'judul' => 'Kegiatan Bersih Bersih SMKN 4 Bogor', 'kategori' => 'Kegiatan', 'tanggal' => '2023-09-28', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'galeri-4.jpg', 'judul' => 'Kegiatan Trans4krab', 'kategori' => 'Kegiatan', 'tanggal' => '2023-09-15', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};