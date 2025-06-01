@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3 class="text-2xl font-bold mb-4">Update Berita</h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label class="mt-3 mb-4">Informasi Berita</label>

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Judul<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control p-2 border rounded" value="{{ old('judul', $berita->judul) }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tanggal<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="date" name="tanggal" class="form-control p-2 border rounded" value="{{ old('tanggal', \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Foto Saat Ini</label>
            <div class="col-sm-10">
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" width="150" class="img-thumbnail mb-2">
                @else
                    <p class="text-muted">Tidak ada foto</p>
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ganti Foto (Opsional)</label>
            <div class="col-sm-10">
                <input type="file" name="gambar" class="form-control p-2 border rounded">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Deskripsi<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea name="konten" class="form-control" rows="5" required>{{ old('konten', $berita->konten) }}</textarea>
            </div>
        </div>

        <p class="text-danger mb-3">Tanda * wajib diisi</p>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
