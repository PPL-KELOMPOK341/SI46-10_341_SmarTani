<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class RiwayatPengeluaranController extends Controller
{
    public function index()
    {
        $data = Pengeluaran::all(); // disesuaikan dengan index.blade modern
        return view('riwayat_pengeluaran.index', compact('data'));
    }

    public function show($id)
    {
        $detail = Pengeluaran::findOrFail($id);
        return view('riwayat_pengeluaran.show', compact('detail'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'nama_tanaman' => 'required|string|max:255',
        'periode' => 'required|string|max:255',
        'tanggal_penanaman' => 'nullable|date',
        'tanggal_pengeluaran' => 'nullable|date',
        'total_biaya_bibit' => 'nullable|numeric',
        'total_biaya_pupuk' => 'nullable|numeric',
        'upah_panen' => 'nullable|numeric',
        'jumlah_pupuk' => 'nullable|numeric',
        'jumlah_bibit' => 'nullable|numeric',
    ]);

    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->update([
        'nama_tanaman' => $request->nama_tanaman,
        'periode' => $request->periode,
        'tanggal_penanaman' => $request->tanggal_penanaman,
        'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        'total_biaya_bibit' => $request->total_biaya_bibit,
        'total_biaya_pupuk' => $request->total_biaya_pupuk,
        'upah_panen' => $request->upah_panen,
        'jumlah_pupuk' => $request->jumlah_pupuk,
        'jumlah_bibit' => $request->jumlah_bibit,
    ]);

    return redirect()->route('riwayat.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    public function edit($id)
    {
    $detail = Pengeluaran::findOrFail($id);
    return view('riwayat_pengeluaran.edit', compact('detail'));
    }
}
