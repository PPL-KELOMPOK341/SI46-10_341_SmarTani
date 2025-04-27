<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;

class GrafikController extends Controller
{
    public function grafikKeuangan(Request $request)
    {
    $tahun = $request->input('tahun');

    $pemasukanQuery = Pendapatan::query();
    $pengeluaranQuery = Pengeluaran::query();

    if ($tahun) {
        $pemasukanQuery->whereYear('tanggal_pemasukan', $tahun);
        $pengeluaranQuery->whereYear('tanggal_pengeluaran', $tahun);
    }

    $pemasukan = $pemasukanQuery->select('periode')
        ->selectRaw('SUM(harga) as total_pemasukan')
        ->groupBy('periode')
        ->pluck('total_pemasukan', 'periode');

    $pengeluaran = $pengeluaranQuery->select('periode')
        ->selectRaw('SUM(total_biaya_bibit + total_biaya_pupuk + upah_panen) as total_pengeluaran')
        ->groupBy('periode')
        ->pluck('total_pengeluaran', 'periode');

    // Gabungkan semua periode yang ada di pemasukan dan pengeluaran
    $allPeriodes = $pemasukan->keys()->merge($pengeluaran->keys())->unique();

    // Ambil semua tahun unik dari pendapatan dan pengeluaran
    $tahunList = Pendapatan::selectRaw('YEAR(tanggal_pemasukan) as tahun')
        ->union(
            Pengeluaran::selectRaw('YEAR(tanggal_pengeluaran) as tahun')
        )
        ->pluck('tahun')
        ->unique()
        ->sort()
        ->values();

    return view('grafik-keuangan', compact('pemasukan', 'pengeluaran', 'allPeriodes', 'tahunList', 'tahun'));
    }
}
