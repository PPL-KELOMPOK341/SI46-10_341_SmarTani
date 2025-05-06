<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Admin: Lihat semua pengaduan
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('pengaduan.riwayat', compact('pengaduans'));
    }

    // User: Tampilkan form pengaduan
    public function create()
    {
        return view('pengaduan.form');
    }

    // User: Simpan pengaduan
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Pengaduan::create($request->all());

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan berhasil dikirim.');
    }

    // Admin: Detail pengaduan
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.detail', compact('pengaduan'));
    }

    // Admin: Edit pengaduan
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    // Admin: Update pengaduan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update($request->all());

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    // Admin: Hapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
