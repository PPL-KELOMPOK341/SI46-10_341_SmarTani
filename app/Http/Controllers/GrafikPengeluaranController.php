<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GrafikPengeluaranController extends Controller
{
    public function index()
    {
        $data = Pengeluaran::selectRaw('periode, SUM(total_biaya_bibit + total_biaya_pupuk + upah_panen) as total_pengeluaran')
            ->groupBy('periode')
            ->orderBy('periode')
            ->get();

        return view('grafik_pengeluaran.index', compact('data'));
    }
}
