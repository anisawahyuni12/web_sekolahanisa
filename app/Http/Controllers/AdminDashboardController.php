<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Produk;
use App\Models\Galeri;
use App\Models\Ekstrakurikuler;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahArtikel = Berita::count();
        $jumlahProduk  = Produk::count();
        $jumlahGaleri  = Galeri::count();
        $jumlahEkskul  = Ekstrakurikuler::count();

        // Sumber aktivitas: tiap tabel, ambil 3 data yang terakhir diubah
        $sumber = [
            ['model' => Berita::class,          'kolom' => 'judul', 'tipe' => 'artikel',
             'baru'  => 'Artikel baru ditambahkan',     'ubah' => 'Admin mengubah Artikel'],
            ['model' => Produk::class,          'kolom' => 'nama',  'tipe' => 'produk',
             'baru'  => 'Produk baru ditambahkan',      'ubah' => 'Admin memperbarui Produk'],
            ['model' => Galeri::class,          'kolom' => 'judul', 'tipe' => 'galeri',
             'baru'  => 'Foto baru diunggah ke Galeri', 'ubah' => 'Admin mengubah foto Galeri'],
            ['model' => Ekstrakurikuler::class, 'kolom' => 'nama',  'tipe' => 'ekskul',
             'baru'  => 'Ekstrakurikuler baru ditambahkan', 'ubah' => 'Admin mengubah Ekstrakurikuler'],
        ];

        $aktivitas = collect();

        foreach ($sumber as $s) {
            $rows = $s['model']::whereNotNull('updated_at')
                ->orderByDesc('updated_at')
                ->take(3)
                ->get();

            foreach ($rows as $row) {
                $barusaja = $row->created_at && $row->created_at->equalTo($row->updated_at);

                $aktivitas->push([
                    'tipe'  => $s['tipe'],
                    'aksi'  => $barusaja ? $s['baru'] : $s['ubah'],
                    'judul' => $row->{$s['kolom']},
                    'waktu' => $row->updated_at,
                ]);
            }
        }

        $aktivitas = $aktivitas->sortByDesc('waktu')->take(5)->values();

        return view('admin.dashboard', compact(
            'jumlahArtikel', 'jumlahProduk', 'jumlahGaleri', 'jumlahEkskul', 'aktivitas'
        ));
    }
}