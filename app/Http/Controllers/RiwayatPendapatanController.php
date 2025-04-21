<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPendapatan;

class RiwayatPendapatanController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatPendapatan::all();
        //dd($riwayat);
        return view('riwayatPendapatan.index', compact('riwayat'));
    }
}
