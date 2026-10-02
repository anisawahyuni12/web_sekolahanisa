<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class AdminEkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskulList = Ekstrakurikuler::orderBy('nama')->get();

        return view('admin.ekstrakurikuler', compact('ekskulList'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori'     => 'required|string|max:100',
            'tipe'         => 'required|string|max:100',
            'pembina'      => 'required|string|max:255',
            'hari_latihan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        Ekstrakurikuler::create($validated);

        return redirect('/dashboard/ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler-form', ['ekskul' => $ekstrakurikuler]);
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori'     => 'required|string|max:100',
            'tipe'         => 'required|string|max:100',
            'pembina'      => 'required|string|max:255',
            'hari_latihan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        $ekstrakurikuler->update($validated);

        return redirect('/dashboard/ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();

        return redirect('/dashboard/ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}