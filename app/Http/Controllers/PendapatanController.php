<?php
namespace App\Http\Controllers;

use App\Models\Penanaman;
use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendapatanController extends Controller
{
    public function create()
    {
        $penanamans = Penanaman::where('user_id', Auth::id())->get();

        if ($penanamans->isEmpty()) {
            return redirect()->route('penanaman.create')
                ->with('warning', 'Anda harus menambahkan data penanaman terlebih dahulu.');
        }

        return view('form-pendapatan', compact('penanamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penanaman_id' => 'required|exists:penanamans,id',
            'sumber_pendapatan' => 'required|string',
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

        return redirect()->route('riwayat-pendapatan.index')->with('success', 'Data pendapatan berhasil disimpan!');
    }

    public function index()
    {
        $pendapatans = Pendapatan::with('penanaman')
            ->whereHas('penanaman', function($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('riwayat-pendapatan', compact('pendapatans'));
    }
}
