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
        $query = Pengaduan::with('user'); // eager load user

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
            })->orWhere('kategori', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereDate('created_at', '>=', $request->start_date)
                ->whereDate('created_at', '<=', $request->end_date);
        }

        $pengaduans = $query->latest()->paginate(10)->withQueryString();

        return view('admin.pengaduan.riwayat', compact('pengaduans'));
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
            'kategori'  => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id'   => Auth::id(),
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'status'    => 'Menunggu',
        ]);

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Admin: Tampilkan detail pengaduan.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id); // <- eager load
        return view('admin.pengaduan.detail', compact('pengaduan'));
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

        return redirect()->route('pengaduan.riwayat')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
