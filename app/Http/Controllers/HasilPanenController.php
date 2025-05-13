<?php

namespace App\Http\Controllers;
use App\Models\HasilPanen;
use App\Models\Penanaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HasilPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah ada riwayat penanaman
        $hasPlanting = Penanaman::where('user_id', auth()->id())->exists();

        if (!$hasPlanting) {
            return view('hasil_panen.index')->with('noPlanting', true);
        }

        // Ambil data pengeluaran yang terkait dengan penanaman milik user yang login
        $hasilPanen = HasilPanen::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', auth()->id());
            })->latest()->get();

        return view('hasil_panen.index', compact('hasilPanen'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hasil_panen.search');
    }

public function search(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required|string'
        ]);

        $penanaman = Penanaman::where('user_id', auth()->id())
                            ->where('nama_tanaman', 'like', '%' . $request->nama_tanaman . '%')
                            ->first();

        if (!$penanaman) {
            return redirect()->back()
                            ->with('error', 'Tidak ada data penanaman dengan nama tanaman tersebut')
                            ->withInput();
        }

        return view('hasil_panen.form', compact('penanaman'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'kualitas_hasil_panen' => 'required',
            'tanggal_panen' => 'required|date',
            'harga_jual_satuan' => 'required|numeric',
            'jumlah_hasil_panen' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        // Pastikan penanaman yang dipilih adalah milik user yang login
        $penanaman = Penanaman::where('user_id', auth()->id())
                            ->findOrFail($request->penanaman_id);

        // Convert tanggal_pengeluaran to Carbon instance
        $validated['tanggal_panen'] = Carbon::parse($validated['tanggal_panen']);

        HasilPanen::create($validated);

        return redirect()->route('hasil-panen.index')->with('success', 'Data hasil panen berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hasilPanen = HasilPanen::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', auth()->id());
            })->findOrFail($id);

        return view('hasil_panen.show', compact('hasilPanen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hasilPanen = HasilPanen::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', auth()->id());
            })->findOrFail($id);

        $penanaman = $hasilPanen->penanaman;
        return view('hasil_panen.form', compact('hasilPanen', 'penanaman'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hasilPanen = HasilPanen::whereHas('penanaman', function($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        $validated = $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'kualitas_hasil_panen' => 'required',
            'tanggal_panen' => 'required|date',
            'harga_jual_satuan' => 'required|numeric',
            'jumlah_hasil_panen' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        $penanaman = Penanaman::where('user_id', auth()->id())
                    ->findOrFail($request->penanaman_id);

        // Convert tanggal_pengeluaran to Carbon instance
        $validated['tanggal_panen'] = Carbon::parse($validated['tanggal_panen']);

        $hasilPanen->update($validated);

        return redirect()->route('hasil-panen.index')->with('success', 'Data pengeluaran berhasil diperbarui.');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hasilPanen = HasilPanen::whereHas('penanaman', function($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        $hasilPanen->delete();

        return redirect()->route('hasil-panen.index')->with('success', 'Data hasil panen berhasil dihapus.');
    }
}
