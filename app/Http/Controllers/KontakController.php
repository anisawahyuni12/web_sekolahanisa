<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan'  => 'required|string',
        ]);

        $validated['ip_address'] = $request->ip();

        Pesan::create($validated);

        return redirect('/kontak')->with('success', 'Pesan Anda berhasil terkirim. Terima kasih sudah menghubungi kami!');
    }
}