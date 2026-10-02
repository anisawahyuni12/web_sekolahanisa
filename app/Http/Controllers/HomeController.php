<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerkini = Berita::orderBy('tanggal', 'desc')->take(3)->get();

        return view('home', compact('beritaTerkini'));
    }
}