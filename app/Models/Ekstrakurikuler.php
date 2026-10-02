<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'foto',
        'nama',
        'kategori',
        'tipe',
        'pembina',
        'hari_latihan',
        'deskripsi',
    ];
}