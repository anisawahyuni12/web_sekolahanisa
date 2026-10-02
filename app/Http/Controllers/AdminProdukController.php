<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produkList = Produk::orderBy('urutan')->get();

        return view('admin.produk', compact('produkList'));
    }

    public function create()
    {
        return view('admin.produk-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'kategori'   => 'required|string|max:100',
            'harga'      => 'required|numeric',
            'tersedia'   => 'required|boolean',
            'deskripsi'  => 'nullable|string',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        $produk = new Produk($validated);
        $produk->urutan = (Produk::max('urutan') ?? 0) + 1;
        $produk->save();

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk-form', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'kategori'   => 'required|string|max:100',
            'harga'      => 'required|numeric',
            'tersedia'   => 'required|boolean',
            'deskripsi'  => 'nullable|string',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        $produk->update($validated);

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect('/dashboard/produk')->with('success', 'Produk berhasil dihapus.');
    }
}