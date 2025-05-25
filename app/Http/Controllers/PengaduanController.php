<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Admin: Menampilkan daftar pengaduan dengan filter pencarian dan tanggal.
     */
    public function index(Request $request)
    {
        $query = Pengaduan::query();

        // Filter berdasarkan pencarian nama, kategori, atau status
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%')
                  ->orWhere('status', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan rentang tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereDate('created_at', '>=', $request->start_date)
                  ->whereDate('created_at', '<=', $request->end_date);
        }

        // Ambil data terbaru dan paginasi
        $pengaduans = $query->latest()->paginate(10)->withQueryString();

        return view('pengaduan.riwayat', compact('pengaduans'));
    }

    /**
     * User: Tampilkan form pengaduan.
     */
    public function create()
    {
        return view('pengaduan.form');
    }

    /**
     * User: Simpan pengaduan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'nama'      => 'required|string',
            'email'     => 'required|email',
            'telepon'   => 'required|string',
            'kategori'  => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Pengaduan::create($request->all());

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Admin: Tampilkan detail pengaduan.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.detail', compact('pengaduan'));
    }

    /**
     * Admin: Tampilkan form edit pengaduan.
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Admin: Simpan perubahan pengaduan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori'  => 'required|string',
            'status'    => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update($request->all());

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    /**
     * Admin: Hapus pengaduan.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
