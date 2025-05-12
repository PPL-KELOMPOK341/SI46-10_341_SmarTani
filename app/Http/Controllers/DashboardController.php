<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // Filter pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('konten', 'like', '%' . $search . '%');
        }

        // Filter tanggal
        if ($request->has('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Urutkan berdasarkan tanggal terbaru
        $query->orderBy('tanggal', 'desc');

        // Pagination
        $beritas = $query->paginate(6);

        return view('dashboard', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('berita.show-petani', compact('berita'));
    }
    
}
