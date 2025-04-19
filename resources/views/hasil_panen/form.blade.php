@extends('layouts.app') <!-- ganti sesuai layout utama kamu -->

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Form Pencatatan Hasil Panen</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/hasil-panen/store') }}" method="POST">
        @csrf

        <div class="card shadow-sm p-4">
            <h5>Informasi Penanaman</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Tanaman *</label>
                    <input type="text" name="nama_tanaman" class="form-control" value="{{ old('nama_tanaman') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Periode *</label>
                    <select name="periode" class="form-select" required>
                        <option value="">-- Pilih Periode --</option>
                        <option value="Periode 1" {{ old('periode') == 'Periode 1' ? 'selected' : '' }}>Periode 1</option>
                        <option value="Periode 2" {{ old('periode') == 'Periode 2' ? 'selected' : '' }}>Periode 2</option>
                        <!-- Tambah sesuai kebutuhan -->
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Tanggal Penanaman *</label>
                <input type="date" name="tanggal_penanaman" class="form-control" value="{{ old('tanggal_penanaman') }}" required>
            </div>

            <h5>🌾 Tahap Panen</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Lokasi Lahan *</label>
                    <input type="text" name="lokasi_lahan" class="form-control" value="{{ old('lokasi_lahan') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kualitas Hasil Panen *</label>
                    <select name="kualitas_hasil_panen" class="form-select" required>
                        <option value="">-- Pilih Kualitas --</option>
                        <option value="Baik" {{ old('kualitas_hasil_panen') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Sedang" {{ old('kualitas_hasil_panen') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="Buruk" {{ old('kualitas_hasil_panen') == 'Buruk' ? 'selected' : '' }}>Buruk</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Harga Jual Satuan *</label>
                    <input type="number" name="harga_jual_satuan" class="form-control" value="{{ old('harga_jual_satuan') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Panen *</label>
                    <input type="date" name="tanggal_panen" class="form-control" value="{{ old('tanggal_panen') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Hasil Panen *</label>
                <input type="number" name="jumlah_hasil_panen" class="form-control" value="{{ old('jumlah_hasil_panen') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Catatan</label>
                <textarea name="catatan" class="form-control" rows="3">{{ old('catatan') }}</textarea>
            </div>

            <p class="text-muted"><span class="text-danger">*</span> Wajib diisi</p>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="#" onclick="history.back()" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>
@endsection
