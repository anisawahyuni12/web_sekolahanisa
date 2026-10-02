<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class AdminBeritaController extends Controller
{
    public function index()
    {
        $beritaList = Berita::orderBy('tanggal', 'desc')->get();

        return view('admin.berita', compact('beritaList'));
    }

    public function create()
    {
        return view('admin.berita-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tanggal'  => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        Berita::create($validated);

        return redirect('/dashboard/berita')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita-form', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tanggal'  => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        $berita->update($validated);

        return redirect('/dashboard/berita')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect('/dashboard/berita')->with('success', 'Artikel berhasil dihapus.');
    }
}