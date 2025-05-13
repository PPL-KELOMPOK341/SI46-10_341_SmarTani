<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaController extends Controller
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

    public function show($slug)
    {
        $berita = Berita::where('judul', 'like', '%' . Str::title(str_replace('-', ' ', $slug)) . '%')
            ->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}
