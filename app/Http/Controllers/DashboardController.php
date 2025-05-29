<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // Pencarian judul atau isi
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

         // Filter berdasarkan rentang tanggal
        if ($request->filled('dari')) {
            $query->whereDate('tanggal', '>=', $request->input('dari'));
        }

        if ($request->filled('sampai')) {
            $query->whereDate('tanggal', '<=', $request->input('sampai'));
        }

        // Urutkan berdasarkan tanggal
        if ($request->input('sort') === 'latest') {
            $query->orderBy('tanggal', 'desc');
        } elseif ($request->input('sort') === 'oldest') {
            $query->orderBy('tanggal', 'asc');
        }

        // Pagination
        $beritas = $query->paginate(6);

        return view('dashboard', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('berita.show-petani', compact('berita'));
    }
    
}
