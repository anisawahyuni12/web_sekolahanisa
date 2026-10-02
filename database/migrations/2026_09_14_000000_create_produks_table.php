<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->string('kategori');
            $table->unsignedInteger('harga');
            $table->boolean('tersedia')->default(true);
            $table->timestamps();
        });

        // Isi data awal (sama seperti yang sudah ada sebelumnya)
        DB::table('produks')->insert([
            ['foto' => 'produk-atribut.jpg', 'nama' => 'Atribut sekolah', 'deskripsi' => 'Atribut khas sekolah', 'kategori' => 'Umum', 'harga' => 70000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-bet.jpg', 'nama' => 'Bet', 'deskripsi' => 'Bet khas sekolah', 'kategori' => 'Umum', 'harga' => 30000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-warepack-tpfl.jpg', 'nama' => 'Warepack TPFL', 'deskripsi' => 'Warepack ( baju jurusan )', 'kategori' => 'TPFL', 'harga' => 450000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-warepack-pplg.jpg', 'nama' => 'Warepack PPLG', 'deskripsi' => 'Warepack ( baju jurusan )', 'kategori' => 'PPLG', 'harga' => 250000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-warepack-tjkt.jpg', 'nama' => 'Warepack TJKT', 'deskripsi' => 'Warepack ( baju jurusan )', 'kategori' => 'TJKT', 'harga' => 250000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-warepack-tkro.jpg', 'nama' => 'Warepack TKRO', 'deskripsi' => 'Warepack ( baju jurusan )', 'kategori' => 'TKRO', 'harga' => 450000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-baju-batik.jpg', 'nama' => 'Baju batik', 'deskripsi' => 'Baju batik khas sekolah', 'kategori' => 'Umum', 'harga' => 150000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'produk-baju-muslim.jpg', 'nama' => 'Baju muslim', 'deskripsi' => 'Baju muslim khas sekolah', 'kategori' => 'Umum', 'harga' => 150000, 'tersedia' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};