@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <legend class="mb-3">FORM PENANAMAN</legend>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <label class="mb-5">Tahap Penanaman</label>

    <form action="{{ route('penanaman.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Nama Tanaman <span class="text-danger">*</span></label>
                    <input type="text" name="nama_tanaman" class="form-control" placeholder="masukkan nama tanaman" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Lokasi Lahan <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi_lahan" class="form-control" placeholder="masukkan lokasi lahan" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Luas Lahan <span class="text-danger">*</span></label>
                    <input type="text" name="luas_lahan" class="form-control" placeholder="satuan (m)" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Periode <span class="text-danger">*</span></label>
                    <select name="periode" class="form-control selectpicker" required>
                        <option value="">pilih periode penanaman</option>
                        <option>Periode I</option>
                        <option>Periode II</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Tanggal Penanaman <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_penanaman" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Jumlah Pupuk yang Digunakan <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_pupuk" class="form-control" placeholder="(kg)" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Jumlah Bibit <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_bibit" class="form-control" placeholder="masukkan jumlah bibit (kg)" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Jenis Pestisida</label>
                    <input type="text" name="jenis_pestisida" placeholder="(opsional)" class="form-control">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Jenis Pupuk</label>
                    <input type="text" name="jenis_pupuk" placeholder="(opsional)" class="form-control">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 200px;">Kendala Selama Perawatan</label>
                    <input type="text" name="kendala" placeholder="(opsional)" class="form-control">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="mb-3 d-flex align-items-center">
                    <label class="me3" style="width: 170px;">Catatan</label>
                    <input type="text" name="catatan" placeholder="(opsional)" class="form-control">
                </div>
            </div>
        </div>
        <p class="text-danger">Tanda * wajib diisi</p>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="#" class="btn btn-danger">Kembali</a>
    </form>
</div>
@endsection