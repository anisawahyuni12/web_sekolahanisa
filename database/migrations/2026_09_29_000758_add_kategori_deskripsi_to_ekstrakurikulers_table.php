<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('nama');
            $table->text('deskripsi')->nullable()->after('hari_latihan');
        });

        // Isi awal untuk 4 data yang sudah ada (bisa diedit lewat halaman admin)
        $isiAwal = [
            'Pramuka (Praja Muda Karana)' => [
                'kategori'  => 'Kepemimpinan',
                'deskripsi' => 'Ekskul pramuka adalah kegiatan di luar jam pelajaran sekolah untuk membentuk karakter siswa, melatih kemandirian, serta menumbuhkan rasa tanggung jawab.',
            ],
            'Paskibra (Pasukan Pengibar Bendera)' => [
                'kategori'  => 'Nasionalisme',
                'deskripsi' => 'Ekstrakurikuler Paskibra adalah kegiatan sekolah di luar jam pelajaran yang melatih siswa menjadi pasukan pengibar bendera, membentuk kedisiplinan, dan menanamkan rasa cinta tanah air.',
            ],
            'Padus' => [
                'kategori'  => 'Kesenian',
                'deskripsi' => 'Paduan suara atau yang disingkat padus adalah kelompok penyanyi yang membawakan musik bersama dalam bentuk harmoni suara.',
            ],
            'PMR' => [
                'kategori'  => 'Kemanusiaan',
                'deskripsi' => 'Ekskul PMR (Palang Merah Remaja) adalah kegiatan ekstrakurikuler di sekolah yang fokus pada pelatihan kesehatan, pertolongan pertama, dan nilai kemanusiaan. Kegiatan ini dibina langsung oleh Palang Merah Indonesia (PMI).',
            ],
        ];

        foreach ($isiAwal as $nama => $data) {
            DB::table('ekstrakurikulers')->where('nama', $nama)->update($data);
        }
    }

    public function down(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'deskripsi']);
        });
    }
};