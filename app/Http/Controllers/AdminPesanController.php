<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminPesanController extends Controller
{
    public function index()
    {
        $pesanList = Pesan::withCount('balasans')->orderBy('created_at', 'desc')->get();

        return view('admin.pesan', compact('pesanList'));
    }

    public function show(Pesan $pesan)
    {
        if (! $pesan->dibaca) {
            $pesan->update(['dibaca' => true]);
        }

        return view('admin.pesan-detail', compact('pesan'));
    }

    public function reply(Request $request, Pesan $pesan)
    {
        $validated = $request->validate([
            'subjek' => 'required|string|max:255',
            'isi'    => 'required|string',
        ]);

        $terkirim = false;

        try {
            Mail::raw($validated['isi'], function ($message) use ($pesan, $validated) {
                $message->to($pesan->email)
                         ->subject($validated['subjek'])
                         ->from(config('mail.from.address'), 'Humas & Informasi SMKN 4 Bogor');
            });
            $terkirim = true;
        } catch (\Exception $e) {
            // SMTP belum/gagal terkonfigurasi — balasan tetap disimpan di bawah
        }

        $pesan->balasans()->create([
            'subjek'   => $validated['subjek'],
            'isi'      => $validated['isi'],
            'terkirim' => $terkirim,
        ]);

        $pesan->update(['dibaca' => true]);

        return redirect()->route('admin.pesan.show', $pesan->id)
            ->with('success', 'Pesan berhasil dikirim.');
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect('/dashboard/kontak')->with('success', 'Pesan berhasil dihapus.');
    }
}