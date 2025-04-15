<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenanamanController extends Controller
{
    public function create()
    {
        return view('penanaman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validated([
            'nama_tanaman' => 'required|string|max:255',
            'lokasi_lahan' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
            'periode' => 'required|string',
            'tanggal_penanaman' => 'required|date',
            'jumlah_pupuk' => 'required|numeric',
            'jumlah_bibit' => 'required|numeric',
            'jenis_pestisida' => 'nullable|string',
            'jenis_pupuk' => 'nullable|string',
            'kendala' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        return redirect()->back()->with('success', 'Data penanaman berhasil disimpan!');
    }
}
