<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPengeluaran;

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
}

