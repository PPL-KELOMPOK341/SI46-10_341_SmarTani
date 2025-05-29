<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // Filter berdasarkan tanggal
        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
        }

        // Filter berdasarkan keyword (judul atau konten)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('konten', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting default by 'id'
        $sort = $request->input('sort', 'id');
        $query->orderBy($sort, 'desc');

        // Paginate
        $beritas = $query->paginate(10)->withQueryString();

        // Flash message jika cancel hapus
        if ($request->has('cancel') && $request->cancel === 'true') {
            session()->flash('cancel_message', 'Berita tidak jadi dihapus.');
        }

        return view('berita.index', [
            'beritas' => $beritas,
            'search' => $request->search,
            'sort' => $sort
        ]);
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date'
        ]);

        $gambarPath = null;
        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('berita-images', 'public');
        }

        Berita::create([
            'judul' => $validated['judul'],
            'konten' => $validated['deskripsi'],
            'gambar' => $gambarPath,
            'tanggal' => $validated['tanggal']
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(Berita $berita)
    {
        return view('berita.show-admin', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date'
        ]);

        // Handle gambar
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita-images', 'public');
        } else {
            unset($validated['gambar']);
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }

    public function showDetailAdmin($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.detail', compact('berita'));
    }

    public function showDetailPetani($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show-petani', compact('berita'));
    }
}