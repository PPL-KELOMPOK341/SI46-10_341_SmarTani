@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Penanaman</h3>
    <form action="{{ route('penanaman.update', $penanaman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Tanaman</label>
                <input type="text" name="nama_tanaman" class="form-control" value="{{ old('nama_tanaman', $penanaman->nama_tanaman) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Lokasi Lahan</label>
                <input type="text" name="lokasi_lahan" class="form-control" value="{{ old('lokasi_lahan', $penanaman->lokasi_lahan) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Luas Lahan (m)</label>
                <input type="text" name="luas_lahan" class="form-control" value="{{ old('luas_lahan', $penanaman->luas_lahan) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Periode</label>
                <select name="periode" class="form-control" required>
                    <option value="">Pilih Periode</option>
                    <option value="Periode I" {{ old('periode', $penanaman->periode) == 'Periode I' ? 'selected' : '' }}>Periode I</option>
                    <option value="Periode II" {{ old('periode', $penanaman->periode) == 'Periode II' ? 'selected' : '' }}>Periode II</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Tanggal Penanaman</label>
                <input type="date" name="tanggal_penanaman" class="form-control" value="{{ old('tanggal_penanaman', $penanaman->tanggal_penanaman) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jumlah Pupuk (kg)</label>
                <input type="number" name="jumlah_pupuk" class="form-control" value="{{ old('jumlah_pupuk', $penanaman->jumlah_pupuk) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jumlah Bibit (kg)</label>
                <input type="number" name="jumlah_bibit" class="form-control" value="{{ old('jumlah_bibit', $penanaman->jumlah_bibit) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Pestisida</label>
                <input type="text" name="jenis_pestisida" class="form-control" value="{{ old('jenis_pestisida', $penanaman->jenis_pestisida) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Pupuk</label>
                <input type="text" name="jenis_pupuk" class="form-control" value="{{ old('jenis_pupuk', $penanaman->jenis_pupuk) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Kendala</label>
                <input type="text" name="kendala" class="form-control" value="{{ old('kendala', $penanaman->kendala) }}">
            </div>

            <div class="col-md-12 mb-3">
                <label>Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ old('catatan', $penanaman->catatan) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update Data</button>
        <a href="{{ route('penanaman.lihat-detail', $penanaman->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection