<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produkList = Produk::orderBy('urutan')->get();

        return view('produk', compact('produkList'));
    }
}