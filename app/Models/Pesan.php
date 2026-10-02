<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'subjek',
        'pesan',
        'dibaca',
        'ip_address',
    ];

    protected $casts = [
        'dibaca' => 'boolean',
    ];

    public function balasans()
    {
        return $this->hasMany(PesanBalasan::class)->orderBy('created_at', 'desc');
    }
}