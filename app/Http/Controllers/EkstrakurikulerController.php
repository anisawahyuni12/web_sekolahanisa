<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskulList = Ekstrakurikuler::orderBy('nama')->get();

        return view('ekstrakurikuler', compact('ekskulList'));
    }
}