<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanBalasan extends Model
{
    protected $fillable = [
        'pesan_id',
        'subjek',
        'isi',
        'terkirim',
    ];

    protected $casts = [
        'terkirim' => 'boolean',
    ];

    public function pesan()
    {
        return $this->belongsTo(Pesan::class);
    }
}