<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Penanaman;
use Carbon\Carbon;

class PengeluaranController extends Controller
{
    public function index()
    {
        // Cek apakah ada riwayat penanaman
        $hasPlanting = Penanaman::where('user_id', auth()->id())->exists();

        if (!$hasPlanting) {
            return view('pengeluaran.index')->with('noPlanting', true);
        }

        // Ambil data pengeluaran yang terkait dengan penanaman milik user yang login
        $pengeluaran = Pengeluaran::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', auth()->id());
            })->latest()->get();

        return view('pengeluaran.index', compact('pengeluaran'));
    }   

    public function create()
    {
        return view('pengeluaran.search');
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

        return view('pengeluaran.form', compact('penanaman'));
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', auth()->id());
            })->findOrFail($id);

        $penanaman = $pengeluaran->penanaman;
        return view('pengeluaran.form', compact('pengeluaran', 'penanaman'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
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

        // Pastikan penanaman yang dipilih adalah milik user yang login
        $penanaman = Penanaman::where('user_id', auth()->id())
                            ->findOrFail($request->penanaman_id);

        // Convert tanggal_pengeluaran to Carbon instance
        $validated['tanggal_pengeluaran'] = Carbon::parse($validated['tanggal_pengeluaran']);

        Pengeluaran::create($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::whereHas('penanaman', function($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        $validated = $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
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

        // Pastikan penanaman yang dipilih adalah milik user yang login
        $penanaman = Penanaman::where('user_id', auth()->id())
                            ->findOrFail($request->penanaman_id);

        // Convert tanggal_pengeluaran to Carbon instance
        $validated['tanggal_pengeluaran'] = Carbon::parse($validated['tanggal_pengeluaran']);

        $pengeluaran->update($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::whereHas('penanaman', function($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil dihapus.');
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', auth()->id());
            })->findOrFail($id);

        return view('pengeluaran.show', compact('pengeluaran'));
    }
}
