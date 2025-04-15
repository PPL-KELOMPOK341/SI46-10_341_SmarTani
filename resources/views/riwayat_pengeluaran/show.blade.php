@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4">Detail Riwayat Pengeluaran</h3>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <th class="w-25">Nama Tanaman</th>
                <td>: {{ $detail->nama_tanaman }}</td>
            </tr>
            <tr>
                <th>Periode Penanaman</th>
                <td>: {{ $detail->periode }}</td>
            </tr>
            <tr>
                <th>Tanggal Penanaman</th>
                <td>: {{ \Carbon\Carbon::parse($detail->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Tanggal Pengeluaran</th>
                <td>: {{ \Carbon\Carbon::parse($detail->tanggal_pengeluaran)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Total Biaya Bibit</th>
                <td>: Rp {{ number_format($detail->biaya_bibit, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Biaya Pupuk</th>
                <td>: Rp {{ number_format($detail->biaya_pupuk, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Upah Panen</th>
                <td>: Rp {{ number_format($detail->upah_panen, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Jumlah Pupuk</th>
                <td>: {{ $detail->jumlah_pupuk }} kg</td>
            </tr>
            <tr>
                <th>Jumlah Bibit</th>
                <td>: {{ $detail->jumlah_bibit }} kg</td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex gap-2 mt-4">
        <a href="{{ route('riwayat.index') }}" class="btn btn-success rounded-pill px-4">Kembali</a>
        <a href="#" class="btn btn-info text-white rounded-pill px-4">Ubah</a>
        <a href="#" class="btn btn-warning text-white rounded-pill px-4">Print</a>
        <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger rounded-pill px-4">Hapus</button>
        </form>
    </div>
</div>
@endsection
