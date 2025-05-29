@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Berita</h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <label class="mt-3 mb-4">Informasi Berita</label>

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 d-flex align-items-center">
            <label class="col-sm-2 col-form-label">Judul<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" placeholder="masukkan judul" required>
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label class="col-sm-2 col-form-label">Tanggal<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="date" name="tanggal" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label class="col-sm-2 col-form-label">Foto<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="file" name="foto" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label class="col-sm-2 col-form-label">Deskripsi<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea name="deskripsi" class="form-control" rows="6" placeholder="masukkan isi berita" required></textarea>
            </div>
        </div>

        <p class="text-danger">Tanda * wajib diisi</p>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
