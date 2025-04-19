<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanController extends Controller
{
    // Menambahkan middleware auth pada konstruktor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('form-pendapatan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'tanggal_penanaman' => 'required|date',
            'sumber_pendapatan' => 'required|string|max:255',
            'tanggal_pemasukan' => 'required|date',
            'total_hasil_pendapatan' => 'required|numeric',
            'sumber_pendapatan_lainnya' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric',
            'tanggal_pemasukan_lainnya' => 'nullable|date',
            'catatan' => 'nullable|string',
        ]);

        Pendapatan::create($request->all());

        return redirect()->route('pendapatan.create')->with('success', 'Data pendapatan berhasil disimpan!');
    }
}
