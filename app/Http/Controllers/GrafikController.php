<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function pemasukanPengeluaran(Request $request)
    {
        // Ambil daftar tahun unik dari pendapatans & pengeluarans
        $tahunPendapatan = DB::table('pendapatans')
            ->selectRaw('YEAR(tanggal_pemasukan) as tahun')->distinct()->pluck('tahun');
        $tahunPengeluaran = DB::table('pengeluarans')
            ->selectRaw('YEAR(tanggal_pengeluaran) as tahun')->distinct()->pluck('tahun');

        // Gabungkan tahun dari dua tabel, buang duplikat, urutkan
        $tahunList = $tahunPendapatan->merge($tahunPengeluaran)->unique()->sort()->values();

        $filterTahun = $request->tahun;

        // Ambil data pemasukan per bulan, filter tahun jika ada
        $pendapatanQuery = DB::table('pendapatans')
            ->selectRaw('DATE_FORMAT(tanggal_pemasukan, "%Y-%m") as bulan, SUM(total_hasil_pendapatan) as total_pendapatan');

        if ($filterTahun) {
            $pendapatanQuery->whereYear('tanggal_pemasukan', $filterTahun);
        }

        $pendapatan = $pendapatanQuery->groupBy('bulan')->orderBy('bulan')->get();

        // Ambil data pengeluaran per bulan, filter tahun jika ada
        $pengeluaranQuery = DB::table('pengeluarans')
            ->selectRaw('DATE_FORMAT(tanggal_pengeluaran, "%Y-%m") as bulan, 
                SUM(total_biaya_bibit + total_biaya_pupuk + upah_panen + harga) as total_pengeluaran');

        if ($filterTahun) {
            $pengeluaranQuery->whereYear('tanggal_pengeluaran', $filterTahun);
        }

        $pengeluaran = $pengeluaranQuery->groupBy('bulan')->orderBy('bulan')->get();

        // Gabungkan semua bulan dari pendapatan dan pengeluaran
        $bulanList = collect($pendapatan)->pluck('bulan')
            ->merge(collect($pengeluaran)->pluck('bulan'))
            ->unique()
            ->sort()
            ->values();

        $grafik = $bulanList->map(function ($bulan) use ($pendapatan, $pengeluaran) {
            $p = $pendapatan->firstWhere('bulan', $bulan)?->total_pendapatan ?? 0;
            $k = $pengeluaran->firstWhere('bulan', $bulan)?->total_pengeluaran ?? 0;

            return [
                'bulan' => $bulan,
                'pendapatan' => (float)$p,
                'pengeluaran' => (float)$k,
            ];
        });

        return view('grafik.pemasukan_pengeluaran', compact('grafik', 'tahunList'));
    }
}
