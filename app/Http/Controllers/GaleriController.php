<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeriList = Galeri::orderBy('tanggal', 'desc')->get();

        return view('galeri', compact('galeriList'));
    }
}