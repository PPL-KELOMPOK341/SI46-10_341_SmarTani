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
        return view('form_pendapatan.form-pendapatan');
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
    
        $pendapatan = Pendapatan::create($request->all());
    
        return view('form_pendapatan.berhasil-simpan', compact('pendapatan'));
    }
    
    // Tampilkan form edit
public function edit($id)
{
    $pendapatan = Pendapatan::findOrFail($id);
    return view('form_pendapatan.edit-pendapatan', compact('pendapatan'));

}

// Proses update data
public function update(Request $request, $id)
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

    $pendapatan = Pendapatan::findOrFail($id);
    $pendapatan->update($request->all());

    return redirect()->route('riwayat.pendapatan')->with('success', 'Data pendapatan berhasil diperbarui!');
}

// Hapus data
public function destroy($id)
{
    $pendapatan = Pendapatan::findOrFail($id);
    $pendapatan->delete();

    return redirect()->route('riwayat.pendapatan')->with('success', 'Data pendapatan berhasil dihapus!');
}

}
