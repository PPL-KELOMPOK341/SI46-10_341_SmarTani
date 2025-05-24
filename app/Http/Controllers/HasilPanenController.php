<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use App\Models\Penanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HasilPanenController extends Controller
{
public function index(Request $request)
{
    $userId = auth()->id();

    // Cek apakah user punya data penanaman
    $hasPlanting = Penanaman::where('user_id', $userId)->exists();

    if (!$hasPlanting) {
        return view('hasil_panen.index')->with('noPlanting', true);
    }

    $query = HasilPanen::with('penanaman')
        ->whereHas('penanaman', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        });

    // ✅ Filter/Search
    if ($search = $request->search) {
        $query->where(function ($q) use ($search) {
            $q->where('kualitas_hasil_panen', 'like', '%' . $search . '%')
              ->orWhere('tanggal_panen', 'like', '%' . $search . '%')
              ->orWhereHas('penanaman', function ($q2) use ($search) {
                  $q2->where('nama_tanaman', 'like', '%' . $search . '%');
              });
        });
    }

    // ✅ Sorting
    if ($request->has('sort')) {
        $direction = $request->get('direction', 'asc');
        switch ($request->sort) {
            case 'tanggal':
                $query->orderBy('tanggal_panen', $direction);
                break;
            case 'kualitas':
                $query->orderBy('kualitas_hasil_panen', $direction);
                break;
            case 'jumlah':
                $query->orderBy('jumlah_hasil_panen', $direction);
                break;
            default:
                $query->latest();
                break;
        }
    } else {
        $query->latest();
    }

    $hasilPanen = $query->get();

    return view('hasil_panen.index', compact('hasilPanen'));
}


    public function create()
    {
        return view('hasil_panen.search');
    }

    public function search(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required|string',
        ]);

        $penanaman = Penanaman::where('user_id', auth()->id())
            ->where('nama_tanaman', 'like', '%' . $request->nama_tanaman . '%')
            ->first();

        if (!$penanaman) {
            return back()->with('error', 'Tidak ada data penanaman dengan nama tersebut')->withInput();
        }

        // Cek batas maksimal data hasil panen per penanaman
        $jumlahHasilPanen = HasilPanen::where('penanaman_id', $penanaman->id)->count();
        if ($jumlahHasilPanen >= 10) {
            return back()->with('error', 'Anda sudah mencapai batas maksimal 10 hasil panen untuk penanaman ini.');
        }

        return view('hasil_panen.form', compact('penanaman'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'kualitas_hasil_panen' => 'required|string',
            'tanggal_panen' => 'required|date',
            'harga_jual_satuan' => 'required|numeric',
            'jumlah_hasil_panen' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        // Cek apakah penanaman milik user
        $penanaman = Penanaman::where('user_id', auth()->id())
            ->findOrFail($request->penanaman_id);

        // Cek batas maksimal data hasil panen
        $jumlahHasilPanen = HasilPanen::where('penanaman_id', $penanaman->id)->count();
        if ($jumlahHasilPanen >= 10) {
            return back()->with('error', 'Anda sudah mencapai batas maksimal 10 hasil panen untuk penanaman ini.');
        }

        $validated['tanggal_panen'] = Carbon::parse($validated['tanggal_panen']);

        HasilPanen::create($validated);

        return redirect()->route('hasil-panen.index')->with('success', 'Data hasil panen berhasil disimpan.');
    }

    public function show($id)
    {
        $hasilPanen = HasilPanen::with('penanaman')
            ->whereHas('penanaman', fn($q) => $q->where('user_id', auth()->id()))
            ->findOrFail($id);

        return view('hasil_panen.show', compact('hasilPanen'));
    }

    public function edit($id)
    {
        $hasilPanen = HasilPanen::with('penanaman')
            ->whereHas('penanaman', fn($q) => $q->where('user_id', auth()->id()))
            ->findOrFail($id);

        $penanaman = $hasilPanen->penanaman;

        return view('hasil_panen.form', compact('hasilPanen', 'penanaman'));
    }

    public function update(Request $request, $id)
    {
        $hasilPanen = HasilPanen::whereHas('penanaman', fn($q) => $q->where('user_id', auth()->id()))
            ->findOrFail($id);

        $validated = $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'kualitas_hasil_panen' => 'required|string',
            'tanggal_panen' => 'required|date',
            'harga_jual_satuan' => 'required|numeric',
            'jumlah_hasil_panen' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        // Cek ulang penanaman yang dipilih
        $penanaman = Penanaman::where('user_id', auth()->id())
            ->findOrFail($request->penanaman_id);

        $validated['tanggal_panen'] = Carbon::parse($validated['tanggal_panen']);

        $hasilPanen->update($validated);

        return redirect()->route('hasil-panen.index')->with('success', 'Data hasil panen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hasilPanen = HasilPanen::whereHas('penanaman', fn($q) => $q->where('user_id', auth()->id()))
            ->findOrFail($id);

        $hasilPanen->delete();

        return redirect()->route('hasil-panen.index')->with('success', 'Data hasil panen berhasil dihapus.');
    }
}
