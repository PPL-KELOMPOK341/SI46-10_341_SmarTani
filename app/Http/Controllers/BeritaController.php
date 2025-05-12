<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'id');

        $beritas = Berita::when($search, function($query) use ($search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('konten', 'like', "%{$search}%");
            })
            ->orderBy($sort)
            ->paginate(10);

        return view('berita.index', compact('beritas', 'search', 'sort'));
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

    //public function showDetailPetani($id)
    //{
        //$berita = Berita::findOrFail($id);
        //return view('berita.detail-petani', compact('berita'));
    //}    

}