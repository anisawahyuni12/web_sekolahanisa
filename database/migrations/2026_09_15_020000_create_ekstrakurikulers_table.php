<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('tipe')->default('Pilihan');
            $table->string('pembina');
            $table->string('hari_latihan');
            $table->timestamps();
        });

        DB::table('ekstrakurikulers')->insert([
            ['foto' => 'ekskul-basket.jpg', 'nama' => 'Basket', 'tipe' => 'Pilihan', 'pembina' => 'Ade Kurniawan', 'hari_latihan' => 'Rabu, 15:00 - 17:00', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-futsal.jpg', 'nama' => 'Futsal', 'tipe' => 'Pilihan', 'pembina' => 'Dede Firmansyah', 'hari_latihan' => 'Kamis, 15:00 - 17:00', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-pramuka.jpg', 'nama' => 'Pramuka (Praja Muda Karana)', 'tipe' => 'Pilihan', 'pembina' => 'Sri Esti', 'hari_latihan' => 'Jumat, 14:00 - 16:30', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-paskibra.jpg', 'nama' => 'Paskibra (Pasukan Pengibar Bendera)', 'tipe' => 'Pilihan', 'pembina' => 'Raden Sunggono', 'hari_latihan' => 'Senin & Rabu, 15:30', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-pmr.jpg', 'nama' => 'PMR', 'tipe' => 'Pilihan', 'pembina' => 'Ruri', 'hari_latihan' => 'Sabtu, 08:00 - 11:00', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-silat.jpg', 'nama' => 'Silat', 'tipe' => 'Pilihan', 'pembina' => 'Yusuf Hidayat', 'hari_latihan' => 'Selasa, 15:00 - 17:00', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-rohis.jpg', 'nama' => 'Rohis', 'tipe' => 'Pilihan', 'pembina' => 'Ahmad Fauzi', 'hari_latihan' => 'Jumat, 13:00 - 14:00', 'created_at' => now(), 'updated_at' => now()],
            ['foto' => 'ekskul-padus.jpg', 'nama' => 'Padus', 'tipe' => 'Pilihan', 'pembina' => 'Tresna', 'hari_latihan' => 'Selasa & Kamis, 15:30', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};