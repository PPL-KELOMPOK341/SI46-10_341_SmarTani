<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    // public function index()
    // {
    //     $pengeluarans = Pengeluaran::all();
    //     return view('pengeluaran.index', compact('pengeluarans'));
    // }

    public function index()
    {
        $pengeluaran = Pengeluaran::all(); // Ambil semua data pengeluaran
        return view('pengeluaran.index', compact('pengeluaran'));
    }   

    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.show', compact('pengeluaran'));
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

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil disimpan.');
    }

}

