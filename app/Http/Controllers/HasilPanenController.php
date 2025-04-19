<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPanen;


class HasilPanenController extends Controller
{
    public function create()
    {
        return view('hasil_panen.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required',
            'periode' => 'required',
            'tanggal_penanaman' => 'required|date',
            'lokasi_lahan' => 'required',
            'kualitas_hasil_panen' => 'required',
            'tanggal_panen' => 'required|date',
            'harga_jual_satuan' => 'required|integer',
            'jumlah_hasil_panen' => 'required|integer',
            'catatan' => 'nullable',
        ]);

        HasilPanen::create($request->all());

        return redirect('/hasil-panen')->with('success', 'Data berhasil disimpan!');
    }
}
