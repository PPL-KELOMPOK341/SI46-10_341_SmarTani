@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Form Pendapatan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pendapatan.store') }}" method="POST">
        @csrf

        <h5>Informasi Penanaman</h5>
        <div class="form-group">
            <label>Nama Tanaman *</label>
            <input type="text" name="nama_tanaman" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Periode *</label>
            <select name="periode" class="form-control" required>
                <option value="">Pilih periode</option>
                <option value="Musim Tanam 1">Musim Tanam 1</option>
                <option value="Musim Tanam 2">Musim Tanam 2</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Penanaman *</label>
            <input type="date" name="tanggal_penanaman" class="form-control" required>
        </div>

        <hr>

        <h5>Biaya Pendapatan</h5>
        <div class="form-group">
            <label>Sumber Pendapatan *</label>
            <input type="text" name="sumber_pendapatan" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal Pemasukan *</label>
            <input type="date" name="tanggal_pemasukan" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Total Hasil Pendapatan *</label>
            <input type="number" name="total_hasil_pendapatan" class="form-control" required>
        </div>

        <hr>

        <h5>Pendapatan Lainnya</h5>
        <div class="form-group">
            <label>Sumber Pendapatan Lainnya</label>
            <input type="text" name="sumber_pendapatan_lainnya" class="form-control">
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="form-group">
            <label>Tanggal Pemasukan</label>
            <input type="date" name="tanggal_pemasukan_lainnya" class="form-control">
        </div>

        <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="#" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection