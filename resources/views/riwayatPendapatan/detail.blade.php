@extends('layouts.app')

@section('content')
<h4 class="mb-4 text-center">Detail Pendapatan</h4>

<div class="container">
    <div class="card shadow-sm rounded">
        <div class="card-body">
            <h5 class="card-title">Informasi Pendapatan</h5>

            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Pemasukan</th>
                    <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Total Hasil Pendapatan</th>
                    <td>Rp {{ number_format($pendapatan->total_hasil_pendapatan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Sumber Pendapatan</th>
                    <td>{{ $pendapatan->sumber_pendapatan }}</td>
                </tr>
                <tr>
                    <th>Nama Tanaman</th>
                    <td>{{ $pendapatan->nama_tanaman }}</td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td>{{ $pendapatan->periode }}</td>
                </tr>
                <tr>
                    <th>Tanggal Penanaman</th>
                    <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Sumber Pendapatan Lainnya</th>
                    <td>{{ $pendapatan->sumber_pendapatan_lainnya ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($pendapatan->harga ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pemasukan Lainnya</th>
                    <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan_lainnya)->translatedFormat('d F Y') ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $pendapatan->catatan ?? '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('riwayat.pendapatan') }}" class="btn btn-secondary">Kembali ke Riwayat Pendapatan</a>
        </div>
    </div>
</div>

@endsection
