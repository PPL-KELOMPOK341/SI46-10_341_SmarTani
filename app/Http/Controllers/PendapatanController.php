<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Penanaman;
use Illuminate\Support\Facades\Auth;

class PendapatanController extends Controller
{
    // Menambahkan middleware auth pada konstruktor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $penanamans = \App\Models\Penanaman::where('user_id', Auth::id())->get();
        return view('form-pendapatan', compact('penanamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sumber_pendapatan' => 'required|string|max:255',
            'tanggal_pemasukan' => 'required|date',
            'total_hasil_pendapatan' => 'required|numeric|min:0'
        ]);

        // Verify that the penanaman belongs to the authenticated user
        $penanaman = Penanaman::findOrFail($request->penanaman_id);
        if ($penanaman->user_id !== Auth::id()) {
            return back()->with('error', 'Data penanaman tidak valid.');
        }

        Pendapatan::create([
            'penanaman_id' => $request->penanaman_id,
            'sumber_pendapatan' => $request->sumber_pendapatan,
            'tanggal_pemasukan' => $request->tanggal_pemasukan,
            'total_hasil_pendapatan' => $request->total_hasil_pendapatan
        ]);

        return redirect()->route('riwayat_pendapatan.index')->with('success', 'Data pendapatan berhasil disimpan!');
    }

    public function index(Request $request)
    {
        $query = Pendapatan::with('penanaman')
            ->whereHas('penanaman', function ($query) {
                $query->where('user_id', Auth::id());
            });
    
        // Filter berdasarkan pencarian (Nama, Tanggal Pemasukan, Total Hasil)
        if ($request->has('search') && $request->search != '') {
            $query->where(function($query) use ($request) {
                // Pencarian berdasarkan sumber pendapatan dan total hasil
                $query->where('sumber_pendapatan', 'like', '%' . $request->search . '%')
                    ->orWhere('total_hasil_pendapatan', 'like', '%' . $request->search . '%')
                    ->orWhereHas('penanaman', function($query) use ($request) {
                        $query->where('nama_tanaman', 'like', '%' . $request->search . '%');
                    });
    
                // Pencarian berdasarkan tanggal (termasuk bulan dan tahun)
                if (strtotime($request->search)) {
                    // Jika input berupa tanggal lengkap (format: dd Month yyyy)
                    if (preg_match('/^\d{1,2} (January|February|March|April|May|June|July|August|September|October|November|December) \d{4}$/i', $request->search)) {
                        $date = date('Y-m-d', strtotime($request->search));
                        $query->orWhereDate('tanggal_pemasukan', '=', $date);
                    }
                    // Jika input berupa bulan dan tahun (format: Month yyyy)
                    elseif (preg_match('/^(January|February|March|April|May|June|July|August|September|October|November|December) \d{4}$/i', $request->search)) {
                        $monthYear = date('Y-m', strtotime($request->search));
                        $query->orWhereRaw("DATE_FORMAT(tanggal_pemasukan, '%Y-%m') = ?", [$monthYear]);
                    }
                    // Jika input berupa tahun saja (format: yyyy)
                    elseif (preg_match('/^\d{4}$/', $request->search)) {
                        $year = date('Y', strtotime($request->search));
                        $query->orWhereYear('tanggal_pemasukan', '=', $year);
                    }
                    // Jika input berupa tanggal dan bulan (format: dd Month)
                    elseif (preg_match('/^\d{1,2} (January|February|March|April|May|June|July|August|September|October|November|December)$/i', $request->search)) {
                        // Menambahkan tahun saat ini pada tanggal
                        $searchDate = $request->search . ' ' . date('Y'); // Menambahkan tahun saat ini
                        $date = date('Y-m-d', strtotime($searchDate));
                        $query->orWhereDate('tanggal_pemasukan', '=', $date);
                    }
                }
            });
        }
    
        // Sorting berdasarkan parameter 'sort'
        if ($request->has('sort')) {
            $sort = $request->sort;
            $direction = $request->has('direction') && $request->direction == 'desc' ? 'desc' : 'asc';
            
            if ($sort == 'tanggal') {
                $query->orderBy('tanggal_pemasukan', $direction);
            } elseif ($sort == 'pendapatan') {
                $query->orderBy('sumber_pendapatan', $direction);
            } elseif ($sort == 'hasil') {
                $query->orderBy('total_hasil_pendapatan', $direction);
            }
        }
    
        $pendapatans = $query->get() ?? collect();
    
        return view('riwayat_pendapatan.index', compact('pendapatans'));
    }

    public function show($id)
    {
        $pendapatan = Pendapatan::with('penanaman')->findOrFail($id);
        return view('riwayat_pendapatan.show', compact('pendapatan'));
    }

    public function print($id)
    {
        $pendapatan = Pendapatan::with('penanaman')->findOrFail($id);
        return view('riwayat_pendapatan.print', compact('pendapatan'));
    }

    public function edit($id)
    {
        $pendapatan = Pendapatan::with('penanaman')->findOrFail($id);
        $penanamans = \App\Models\Penanaman::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
        return view('riwayat_pendapatan.edit', compact('pendapatan', 'penanamans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'sumber_pendapatan' => 'required|string|max:255',
            'tanggal_pemasukan' => 'required|date',
            'total_hasil_pendapatan' => 'required|numeric|min:0'
        ]);

        $pendapatan = Pendapatan::findOrFail($id);

        // Verify that the penanaman belongs to the authenticated user
        $penanaman = \App\Models\Penanaman::findOrFail($request->penanaman_id);
        if ($penanaman->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            return back()->with('error', 'Data penanaman tidak valid.');
        }

        $pendapatan->update([
            'penanaman_id' => $request->penanaman_id,
            'sumber_pendapatan' => $request->sumber_pendapatan,
            'tanggal_pemasukan' => $request->tanggal_pemasukan,
            'total_hasil_pendapatan' => $request->total_hasil_pendapatan
        ]);

        return redirect()->route('pendapatan.show', $pendapatan->id)->with('success', 'Data pendapatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendapatan = Pendapatan::findOrFail($id);
        $pendapatan->delete();

        return redirect()->route('riwayat_pendapatan.index')->with('success', 'Data pendapatan berhasil dihapus!');
    }
}
