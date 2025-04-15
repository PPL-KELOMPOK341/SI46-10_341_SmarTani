<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // Filter tanggal
        if ($request->has('dari')) {
            $query->where('tanggal', '>=', $request->dari);
        }
        if ($request->has('sampai')) {
            $query->where('tanggal', '<=', $request->sampai);
        }

        // Search
        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $beritas = $query->orderBy('tanggal', 'desc')->paginate(6);
        return view('dashboard', compact('beritas'));
    }
}
