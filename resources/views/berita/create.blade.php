@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-2xl font-bold mb-4">Tambah Berita</h3>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label class="mt-3 mb-4">Informasi Berita</label>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Judul<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control p-2 border rounded" placeholder="Masukkan judul" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tanggal<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" class="form-control p-2 border rounded" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Foto<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control p-2 border rounded" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Deskripsi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" rows="6" placeholder="Masukkan isi berita" required></textarea>
                </div>
            </div>

            <p class="text-danger mb-3">Tanda * wajib diisi</p>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
