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

    public function index(Request $request)
    {
        $query = \App\Models\Penanaman::query();

        // Filter Nama Tanaman
        if ($request->filled('nama_tanaman')) {
            $query->where('nama_tanaman', 'like', '%' . $request->nama_tanaman . '%');
        }

        // Filter Periode
        if ($request->filled('periode')) {
            $query->where('periode', $request->periode);
        }

        // Search Umum
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_tanaman', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi_lahan', 'like', '%' . $request->search . '%');
            });
        }

        $penanaman = $query->latest()->get();

        return view('penanaman.index', compact('penanaman'));
    }
}
