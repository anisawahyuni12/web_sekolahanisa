<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $galeriList = Galeri::orderBy('tanggal', 'desc')->get();

        return view('admin.galeri', compact('galeriList'));
    }

    public function create()
    {
        return view('admin.galeri-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tanggal'  => 'required|date',
            'foto'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        Galeri::create($validated);

        return redirect('/dashboard/galeri')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri-form', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tanggal'  => 'required|date',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        $galeri->update($validated);

        return redirect('/dashboard/galeri')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect('/dashboard/galeri')->with('success', 'Foto galeri berhasil dihapus.');
    }
}