<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->integer('urutan')->default(0)->after('id');
        });

        // Atur urutan tampil sesuai posisi aslinya (dicocokkan lewat nama produk)
        $urutan = [
            'Atribut sekolah' => 1,
            'Bet' => 2,
            'Warepack TPFL' => 3,
            'Warepack PPLG' => 4,
            'Warepack TJKT' => 5,
            'Warepack TKRO' => 6,
            'Baju batik' => 7,
            'Baju muslim' => 8,
        ];

        foreach ($urutan as $nama => $posisi) {
            DB::table('produks')->where('nama', $nama)->update(['urutan' => $posisi]);
        }
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('urutan');
        });
    }
};