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
        $validated = $request->validate([
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

        $validated['user_id'] = auth()->id();
        $penanaman = \App\Models\Penanaman::create($validated);

        return redirect()->route('penanaman.hasil-form', $penanaman->id);
        //return redirect()->route('penanaman.index')->with('success', 'Data berhasil disimpan');
    }

    public function index(Request $request)
    {
        $query = \App\Models\Penanaman::with('user')->where('user_id', auth()->id());

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_tanaman', 'like', '%' . $request->search . '%')
                ->orWhere('periode', 'like', '%' . $request->search . '%');
            });
        }

        // Sort
        $sort = $request->get('sort');
        $direction = $request->get('direction', 'asc');

        if (in_array($sort, ['periode', 'nama_tanaman', 'tanggal_tanam'])) {
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('created_at', 'desc'); // default urutan
        }

        $penanaman = $query->paginate(10)->withQueryString();

        return view('penanaman.riwayat', compact('penanaman'));
    }


    public function hasilForm($id)
    {
        $penanaman = \App\Models\Penanaman::findOrFail($id);

        return view('penanaman.hasil-form', compact('penanaman'));
    }

    public function lihatDetail($id)
    {
        $penanaman = \App\Models\Penanaman::where('user_id', auth()->id())
                                        ->findOrFail($id);

        return view('penanaman.lihat-detail', compact('penanaman'));
    }

    public function update(Request $request, $id)
    {
        $penanaman = \App\Models\Penanaman::where('user_id', auth()->id())
                                        ->findOrFail($id);

        $penanaman->update($request->all());

        return redirect()->route('penanaman.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function edit($id)
    {
        $penanaman = \App\Models\Penanaman::where('user_id', auth()->id())
                                        ->findOrFail($id);

        return view('penanaman.edit', compact('penanaman'));
    }

    public function destroy($id)
    {
        $penanaman = \App\Models\Penanaman::where('user_id', auth()->id())
                                        ->findOrFail($id);
        $penanaman->delete();

        return redirect()->route('penanaman.index')->with('success', 'Data penanaman berhasil dihapus!');
    }

}
