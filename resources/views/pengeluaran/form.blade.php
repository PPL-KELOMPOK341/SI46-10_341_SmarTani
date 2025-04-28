@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <legend class="mb-3">{{ isset($pengeluaran) ? 'Edit' : 'Tambah' }} PENGELUARAN</legend>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-info">
                <strong>Data Penanaman:</strong><br>
                Nama Tanaman: {{ $penanaman->nama_tanaman }}<br>
                Periode: {{ $penanaman->periode }}<br>
                Tanggal Penanaman: {{ $penanaman->tanggal_penanaman->format('d/m/Y') }}
            </div>

            <form action="{{ isset($pengeluaran) ? route('pengeluaran.update', $pengeluaran->id) : route('pengeluaran.store') }}" method="POST">
                @csrf
                @if(isset($pengeluaran))
                    @method('PUT')
                @endif

                <input type="hidden" name="penanaman_id" value="{{ $penanaman->id }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Total Biaya Bibit <span class="text-danger">*</span></label>
                            <input type="number" name="total_biaya_bibit" class="form-control" placeholder="Rp." value="{{ isset($pengeluaran) ? $pengeluaran->total_biaya_bibit : old('total_biaya_bibit') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Upah Panen <span class="text-danger">*</span></label>
                            <input type="number" name="upah_panen" class="form-control" placeholder="Rp." value="{{ isset($pengeluaran) ? $pengeluaran->upah_panen : old('upah_panen') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Total Biaya Pupuk <span class="text-danger">*</span></label>
                            <input type="number" name="total_biaya_pupuk" class="form-control" placeholder="Rp." value="{{ isset($pengeluaran) ? $pengeluaran->total_biaya_pupuk : old('total_biaya_pupuk') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Jumlah Pupuk <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah_pupuk" class="form-control" placeholder="(kg)" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Tanggal Pengeluaran <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_pengeluaran" class="form-control" value="{{ isset($pengeluaran) ? $pengeluaran->tanggal_pengeluaran->format('Y-m-d') : old('tanggal_pengeluaran') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Jumlah Bibit <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah_bibit" class="form-control" placeholder="(kg)" value="{{ isset($pengeluaran) ? $pengeluaran->jumlah_bibit : old('jumlah_bibit') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Tujuan Pengeluaran <span class="text-danger">*</span></label>
                            <input type="text" name="tujuan_pengeluaran" class="form-control" placeholder="masukkan tujuan pengeluaran" value="{{ isset($pengeluaran) ? $pengeluaran->tujuan_pengeluaran : old('tujuan_pengeluaran') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Harga <span class="text-danger">*</span></label>
                            <input type="number" name="harga" class="form-control" placeholder="Rp." value="{{ isset($pengeluaran) ? $pengeluaran->harga : old('harga') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Catatan</label>
                            <input type="text" name="catatan" placeholder="(opsional)" class="form-control" value="{{ isset($pengeluaran) ? $pengeluaran->catatan : old('catatan') }}">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">{{ isset($pengeluaran) ? 'Update' : 'Simpan' }}</button>
                    <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
