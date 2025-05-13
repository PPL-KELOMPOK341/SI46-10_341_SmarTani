@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <legend class="mb-3">EDIT PENGELUARAN</legend>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Pilih Penanaman <span class="text-danger">*</span></label>
                    <select name="penanaman_id" class="form-control selectpicker" required>
                        <option value="">Pilih data penanaman</option>
                        @foreach($penanamans as $penanaman)
                            <option value="{{ $penanaman->id }}" {{ $pengeluaran->penanaman_id == $penanaman->id ? 'selected' : '' }}>
                                {{ $penanaman->nama_tanaman }} - {{ $penanaman->periode }} ({{ $penanaman->tanggal_penanaman->format('d/m/Y') }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Total Biaya Bibit <span class="text-danger">*</span></label>
                    <input type="number" name="total_biaya_bibit" class="form-control" value="{{ $pengeluaran->total_biaya_bibit }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Upah Panen <span class="text-danger">*</span></label>
                    <input type="number" name="upah_panen" class="form-control" value="{{ $pengeluaran->upah_panen }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Total Biaya Pupuk <span class="text-danger">*</span></label>
                    <input type="number" name="total_biaya_pupuk" class="form-control" value="{{ $pengeluaran->total_biaya_pupuk }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Jumlah Pupuk <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_pupuk" class="form-control" value="{{ $pengeluaran->jumlah_pupuk }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Tanggal Pengeluaran <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_pengeluaran" class="form-control" value="{{ $pengeluaran->tanggal_pengeluaran->format('Y-m-d') }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Jumlah Bibit <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_bibit" class="form-control" value="{{ $pengeluaran->jumlah_bibit }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Tujuan Pengeluaran <span class="text-danger">*</span></label>
                    <input type="text" name="tujuan_pengeluaran" class="form-control" value="{{ $pengeluaran->tujuan_pengeluaran }}" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Harga <span class="text-danger">*</span></label>
                    <input type="number" name="harga" class="form-control" value="{{ $pengeluaran->harga }}" required>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Catatan</label>
                    <input type="text" name="catatan" class="form-control" value="{{ $pengeluaran->catatan }}">
                </div>
            </div>
        </div>
        <p class="text-danger">Tanda * wajib diisi</p>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger">Kembali</a>
    </form>
</div>
@endsection
