@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row shadow rounded overflow-hidden">
        <!-- Kiri: Tulisan -->
        <div class="col-md-5 d-flex align-items-center justify-content-center bg-primary text-white p-4">
            <h3 class="text-center">Jika ada masalah,<br>tinggalkan pesan</h3>
        </div>

        <!-- Kanan: Form -->
        <div class="col-md-7 bg-white p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('pengaduan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="{{ auth()->user()->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" name="telepon" required>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="Teknis">Teknis</option>
                        <option value="Layanan">Layanan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Isi Pengaduan</label>
                    <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
</div>
@endsection
