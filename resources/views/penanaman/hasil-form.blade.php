@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <div class="center-icon">
        <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="Success" />
        <h3 class="mt-4" style="color: #2d7a42;">Hasil Penanaman Berhasil di Simpan</h3>
        <p><strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</strong></p>
    </div>

    <hr class="my-5">

    <div class="row justify-content-center text-start">
        <div class="col-md-6">
            <p><span class="detail-label">Nama Tanaman</span> <span class="float-end">{{ $penanaman->nama_tanaman }}</span></p>
            <p><span class="detail-label">Lokasi Lahan</span> <span class="float-end">{{ $penanaman->lokasi_lahan }}</span></p>
            <p><span class="detail-label">Luas Lahan</span> <span class="float-end">{{ $penanaman->luas_lahan }} m</span></p>
            <p><span class="detail-label">Periode Penanaman</span> <span class="float-end">{{ $penanaman->periode }}</span></p>
            <p><span class="detail-label">Tanggal Penanaman</span> <span class="float-end">{{ \Carbon\Carbon::parse($penanaman->tanggal_penanaman)->translatedFormat('d F Y') }}</span></p>
            <p><span class="detail-label">Jumlah Pupuk</span> <span class="float-end">{{ $penanaman->jumlah_pupuk }} kg</span></p>
            <p><span class="detail-label">Jumlah Bibit</span> <span class="float-end">{{ $penanaman->jumlah_bibit }} kg</span></p>
            <p><span class="detail-label">Jenis Pestisida</span> <span class="float-end">{{ $penanaman->jenis_pestisida ?? 'Tidak Ada' }}</span></p>
            <p><span class="detail-label">Jenis Pupuk</span> <span class="float-end">{{ $penanaman->jenis_pupuk ?? 'Tidak Ada' }}</span></p>
            <p><span class="detail-label">Kendala</span> <span class="float-end">{{ $penanaman->kendala ?? 'Tidak Ada' }}</span></p>
            <p><span class="detail-label">Catatan</span> <span class="float-end">{{ $penanaman->catatan ?? 'Tidak Ada' }}</span></p>
        </div>
    </div>

    <div class="mt-4">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="/riwayat-penanaman" class="btn btn-danger">Back to Home</a>
    </div>
</div>
@endsection