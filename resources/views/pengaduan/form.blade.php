@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row shadow rounded overflow-hidden">
        <!-- Kiri: Tulisan + Bantuan (Rata Kiri) -->
        <div class="col-md-5 d-flex flex-column justify-content-center text-black p-4" style="background-color: #FFFFFF;">
            <div>
                <h3 class="text-start fw-bold" style="color: #255946;">
                    Jika ada masalah,<br>tinggalkan pesan
                </h3>
                <p class="text-start mt-3">Jika terdapat masalah, silahkan dapat mengisi formulir pada laman berikut:</p>
                <div class="d-flex gap-3 fs-4 mt-3">
                    <a href="#" class="text-decoration-none text-dark"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-decoration-none text-dark"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-decoration-none text-dark"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="text-decoration-none text-dark"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
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

                <button type="submit" class="btn w-100 text-white" style="background-color: #FFC14B;">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
</div>
@endsection
