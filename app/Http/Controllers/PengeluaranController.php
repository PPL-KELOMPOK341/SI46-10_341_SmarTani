<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // Tampilkan form input pengeluaran
    public function create()
    {
        return view('pengeluaran.create');
    }

    // Simpan data pengeluaran ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Pengeluaran::create($validated);

        return redirect()->route('pengeluaran.success')->with('success', 'Data berhasil ditambahkan');
    }

    // Tampilkan semua data pengeluaran (jika ingin ditampilkan di index)
    public function index()
    {
        $data = Pengeluaran::all();
        return view('pengeluaran.index', compact('data'));
    }

    // Tampilkan halaman sukses setelah simpan
    public function success()
    {
        return view('pengeluaran.success');
    }
}
