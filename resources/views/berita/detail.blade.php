@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Berita</h2>

    <div class="card p-4">
        <h4 class="fw-bold text-center">{{ $berita->judul }}</h4>

        <div class="text-center my-3">
            @if ($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Foto Berita" style="max-width: 300px;" class="img-fluid rounded">
            @else
                <p class="text-muted">Tidak ada foto tersedia</p>
            @endif
        </div>

        <div class="mb-3 d-flex align-items-center">
            <label class="fw-semibold col-sm-2 col-form-label">Hari/Tanggal:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}" readonly>
            </div>
        </div>

        <div class="mb-3 d-flex align-items-center">
            <label class="fw-semibold col-sm-2 col-form-label">Isi Berita:</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="6" readonly>{{ $berita->konten }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <!-- Tombol Kembali -->
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>

            <!-- Tombol Update dan Hapus -->
            <div class="d-flex gap-2">
                <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary">Update</a>
                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
