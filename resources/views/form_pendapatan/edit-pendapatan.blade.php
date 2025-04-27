@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success fw-semibold">Edit Pendapatan</h2>

    <form action="{{ route('pendapatan.update', $pendapatan->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <!-- Informasi Penanaman -->
        <div class="mb-4">
            <h5 class="mb-3 fw-semibold text-success">Informasi Penanaman</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Tanaman <span class="text-danger">*</span></label>
                    <input type="text" name="nama_tanaman" class="form-control" value="{{ old('nama_tanaman', $pendapatan->nama_tanaman) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Periode <span class="text-danger">*</span></label>
                    <select name="periode" class="form-select" required>
                        <option value="">Pilih Periode Penanaman</option>
                        <option value="1" {{ old('periode', $pendapatan->periode) == '1' ? 'selected' : '' }}>Periode 1</option>
                        <option value="2" {{ old('periode', $pendapatan->periode) == '2' ? 'selected' : '' }}>Periode 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Penanaman <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_penanaman" class="form-control" value="{{ old('tanggal_penanaman', $pendapatan->tanggal_penanaman) }}" required>
                </div>
            </div>
        </div>

        <!-- Biaya Pendapatan -->
        <div class="mb-4">
            <h5 class="mb-3 fw-semibold text-success">Biaya Pendapatan</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Sumber Pendapatan <span class="text-danger">*</span></label>
                    <input type="text" name="sumber_pendapatan" class="form-control" value="{{ old('sumber_pendapatan', $pendapatan->sumber_pendapatan) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Pemasukan <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_pemasukan" class="form-control" value="{{ old('tanggal_pemasukan', $pendapatan->tanggal_pemasukan) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Total Hasil Pendapatan <span class="text-danger">*</span></label>
                    <input type="number" name="total_hasil_pendapatan" class="form-control" value="{{ old('total_hasil_pendapatan', $pendapatan->total_hasil_pendapatan) }}" required>
                </div>
            </div>
        </div>

        <!-- Pendapatan Lainnya -->
        <div class="mb-4">
            <h5 class="mb-3 fw-semibold text-success">Pendapatan Lainnya</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Sumber Pendapatan Lainnya</label>
                    <input type="text" name="sumber_pendapatan_lainnya" class="form-control" value="{{ old('sumber_pendapatan_lainnya', $pendapatan->sumber_pendapatan_lainnya) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga', $pendapatan->harga) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Pemasukan Lainnya</label>
                    <input type="date" name="tanggal_pemasukan_lainnya" class="form-control" value="{{ old('tanggal_pemasukan_lainnya', $pendapatan->tanggal_pemasukan_lainnya) }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3">{{ old('catatan', $pendapatan->catatan) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('riwayat.pendapatan') }}" class="btn btn-secondary">Batal</a>
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
