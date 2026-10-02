<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesan_balasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesan_id')->constrained('pesans')->onDelete('cascade');
            $table->string('subjek');
            $table->text('isi');
            $table->boolean('terkirim')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesan_balasans');
    }
};