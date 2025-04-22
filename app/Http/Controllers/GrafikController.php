<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function index()
    {
        // Data pengeluaran
        $pengeluaran = DB::table('riwayat_pengeluaran')
            ->select(DB::raw('DATE(tanggal_pengeluaran) as tanggal'), DB::raw('SUM(jumlah) as total'))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Data pemasukan
        $pemasukan = DB::table('pendapatans')
            ->select(DB::raw('DATE(tanggal_pemasukan) as tanggal'), DB::raw('SUM(total_hasil_pendapatan) as total'))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('grafik.pemasukan_pengeluaran', compact('pengeluaran', 'pemasukan'));
    }
}
