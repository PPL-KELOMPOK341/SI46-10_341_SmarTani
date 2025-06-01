@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Detail Berita</h2>

    <div class="card p-4 shadow-sm">
        <h4 class="fw-bold text-center">{{ $berita->judul }}</h4>

        <div class="text-center my-3">
            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Foto Berita" class="img-fluid rounded d-block mx-auto" style="max-width: 300px;">
            @else
                <p class="text-muted">Tidak ada foto tersedia</p>
            @endif
        </div>

        <div class="mb-3 row">
            <label class="fw-semibold col-sm-2 col-form-label">Hari/Tanggal:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control p-2 border rounded" value="{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="fw-semibold col-sm-2 col-form-label">Isi Berita:</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="6" readonly>{{ $berita->konten }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-start gap-2 mt-3">
            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary">Update</a>
            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
