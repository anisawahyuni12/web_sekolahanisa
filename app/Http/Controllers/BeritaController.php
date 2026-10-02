<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaList = Berita::orderBy('tanggal', 'desc')->get();

        return view('berita', compact('beritaList'));
    }
}