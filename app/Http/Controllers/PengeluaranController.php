<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        // View ini bisa kamu hapus kalau udah nggak dipakai lagi
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return redirect()->route('riwayat.show', $pengeluaran->id);
    }

    public function create()
    {
        return view('pengeluaran.form');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function destroy($id)
    {
    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->delete();

    return redirect()->route('riwayat.index')->with('success', 'Data berhasil dihapus!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required',
            'periode' => 'required',
            'tanggal_penanaman' => 'required|date',
            'total_biaya_bibit' => 'required|numeric',
            'upah_panen' => 'required|numeric',
            'total_biaya_pupuk' => 'required|numeric',
            'jumlah_pupuk' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
            'jumlah_bibit' => 'required|numeric',
            'tujuan_pengeluaran' => 'required',
            'harga' => 'required|numeric',
            'catatan' => 'nullable|string'
        ]);

        Pengeluaran::create($request->all());

        // Arahkan langsung ke riwayat pengeluaran (modern index)
        return redirect()->route('riwayat.index')->with('success', 'Pengeluaran berhasil disimpan.');
    }
}
