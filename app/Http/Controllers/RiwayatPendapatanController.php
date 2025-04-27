<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPendapatan;

class RiwayatPendapatanController extends Controller
{
    public function index(Request $request)
    {
        $query = RiwayatPendapatan::query();
    
        // Filtering pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
    
            // Coba parsing search sebagai tanggal
            try {
                $parsedDate = \Carbon\Carbon::parse($search)->format('Y-m-d');
            } catch (\Exception $e) {
                $parsedDate = null;
            }
    
            $query->where(function ($q) use ($search, $parsedDate) {
                $q->where('sumber_pendapatan', 'like', '%' . $search . '%');
    
                if ($parsedDate) {
                    $q->orWhereDate('tanggal_pemasukan', $parsedDate);
                }
            });
        }
    
        // Sorting
        $sortBy = $request->get('sort_by', 'tanggal');
        $order = $request->get('order', 'asc');
    
        if ($sortBy == 'total') {
            $query->orderBy('total_hasil_pendapatan', $order);
        } elseif ($sortBy == 'sumber') {
            $query->orderBy('sumber_pendapatan', $order);
        } else {
            $query->orderBy('tanggal_pemasukan', $order);
        }
    
        $riwayat = $query->get();
    
        return view('riwayatPendapatan.index', [
            'riwayat' => $riwayat,
            'currentSort' => $sortBy,
            'currentOrder' => $order
        ]);
    }
    public function show($id)
{
    // Ambil data pendapatan berdasarkan ID
    $pendapatan = RiwayatPendapatan::findOrFail($id);

    // Kirim data pendapatan ke view
    return view('riwayatPendapatan.detail', compact('pendapatan'));
}

    
}
