@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success fw-semibold">Form Pendapatan</h2>

    <form action="{{ route('pendapatan.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <!-- Informasi Penanaman -->
        <div class="mb-4">
            <h5 class="mb-3 fw-semibold text-success">Informasi Penanaman</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Tanaman <span class="text-danger">*</span></label>
                    <input type="text" name="nama_tanaman" class="form-control" placeholder="Masukkan nama tanaman" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Periode <span class="text-danger">*</span></label>
                    <select name="periode" class="form-select" required>
                        <option value="">Pilih Periode Penanaman</option>
                        <option value="1">Periode 1</option>
                        <option value="2">Periode 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Penanaman <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_penanaman" class="form-control" required> 
                </div>
            </div>
        </div>

        <!-- Biaya Pendapatan -->
        <div class="mb-4">
            <h5 class="mb-3 fw-semibold text-success">Biaya Pendapatan</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Sumber Pendapatan <span class="text-danger">*</span></label>
                    <input type="text" name="sumber_pendapatan" class="form-control" placeholder="Masukkan sumber pendapatan" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Pemasukan <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_pemasukan" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Total Hasil Pendapatan <span class="text-danger">*</span></label>
                    <input type="number" name="total_hasil_pendapatan" class="form-control" placeholder="Rp." required>
                </div>
            </div>
        </div>

        <!-- Pendapatan Lainnya -->
        <div class="mb-4">
            <h5 class="mb-3 fw-semibold text-success">Pendapatan Lainnya</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Sumber Pendapatan Lainnya</label>
                    <input type="text" name="sumber_pendapatan_lainnya" class="form-control" placeholder="Masukkan pendapatan lainnya">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Rp.">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Pemasukan</label>
                    <input type="date" name="tanggal_pemasukan_lainnya" class="form-control">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="(Opsional)"></textarea>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/dashboard" class="btn btn-danger">Kembali</a>
        </div>

        <!-- Validasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
@endsection
