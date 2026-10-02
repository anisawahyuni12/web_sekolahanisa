<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'foto',
        'judul',
        'kategori',
        'tanggal',
        'deskripsi',
    ];
}