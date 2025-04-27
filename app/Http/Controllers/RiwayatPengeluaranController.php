<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPengeluaran;
use Illuminate\Support\Facades\DB;

class RiwayatPengeluaranController extends Controller
{
    public function index()
    {
        $data = RiwayatPengeluaran::all();
        return view('riwayat_pengeluaran.index', compact('data'));
    }

    public function show($id)
    {
        $detail = RiwayatPengeluaran::findOrFail($id);
        return view('riwayat_pengeluaran.show', compact('detail'));
    }

    public function grafikPengeluaran()
    {
        $pengeluaran = DB::table('riwayat_pengeluaran')
            ->select(DB::raw('DATE(tanggal_pengeluaran) as tanggal'), DB::raw('SUM(jumlah) as total'))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $labels = $pengeluaran->pluck('tanggal');
        $data = $pengeluaran->pluck('total');
    
        return view('riwayat_pengeluaran.grafik_pengeluaran', compact('labels', 'data'));
    }
}

    

