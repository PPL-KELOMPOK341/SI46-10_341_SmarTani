@extends('layouts.app')

@section('content')
<!-- Sidebar -->
<aside class="bg-light p-3" style="width: 250px;">
    <ul class="nav flex-column gap-2">
        <li class="nav-item"><a href="/dashboard" class="nav-link active">Beranda</a></li>
        <li class="nav-item"><a href="/form-pencatatan" class="nav-link">Form Pencatatan</a></li>
        <li class="nav-item"><a href="/riwayat-penanaman" class="nav-link">Riwayat Penanaman</a></li>
        <li class="nav-item"><a href="/riwayat-hasil-panen" class="nav-link">Riwayat Hasil Panen</a></li>
        <li class="nav-item"><a href="/riwayat_pendapatan" class="nav-link">Riwayat Pendapatan</a></li>
        <li class="nav-item"><a href="/riwayat-pengeluaran" class="nav-link">Riwayat Pengeluaran</a></li>
        <li class="nav-item"><a href="/grafik" class="nav-link">Grafik</a></li>
        <li class="nav-item"><a href="/form-pengaduan" class="nav-link">Form Pengaduan</a></li>
        <li class="nav-item"><a href="/logout" class="nav-link text-danger">Logout</a></li>
    </ul>
</aside>

<!-- Main Content -->
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <h2 class="mb-4">Form Pendapatan</h2>
    <form action="{{ route('pendapatan.store') }}" method="POST">
        @csrf
        <div class="card p-4">
            <h5>Informasi Penanaman</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nama Tanaman *</label>
                    <input type="text" name="nama_tanaman" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Periode *</label>
                    <select name="periode" class="form-control" required>
                        <option value="">Pilih Periode Penanaman</option>
                        <option value="1">Periode 1</option>
                        <option value="2">Periode 2</option>
                    </select>
                </div>
                <div class="col-md-6 mt-3">
                    <label>Tanggal Penanaman</label>
                    <input type="date" name="tanggal_penanaman" class="form-control">
                </div>
            </div>

            <button type="button" class="btn btn-warning mb-3">Cari Data</button>

            <h5>Biaya Pendapatan</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Sumber Pendapatan *</label>
                    <input type="text" name="sumber_pendapatan" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Pemasukan *</label>
                    <input type="date" name="tanggal_pemasukan" class="form-control" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label>Total Hasil Pendapatan *</label>
                    <input type="number" name="total_hasil_pendapatan" class="form-control" required>
                </div>
            </div>

            <h5>Pendapatan Lainnya</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Sumber Pendapatan Lainnya</label>
                    <input type="text" name="sumber_pendapatan_lainnya" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control">
                </div>
                <div class="col-md-6 mt-3">
                    <label>Tanggal Pemasukan</label>
                    <input type="date" name="tanggal_pemasukan_lainnya" class="form-control">
                </div>
                <div class="col-md-12 mt-3">
                    <label>Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3"></textarea>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/dashboard" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</main>
@endsection
