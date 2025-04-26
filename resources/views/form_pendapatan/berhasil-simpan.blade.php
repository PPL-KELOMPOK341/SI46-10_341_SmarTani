@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="mt-5 mb-4">
        <img src="{{ asset('assets/success-icon.png') }}" alt="Success" width="100">
        <h2 class="text-success fw-bold mt-3">Hasil Pendapatan Berhasil di Simpan</h2>
        <p class="text-muted">{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan)->translatedFormat('l, d F Y') }}</p>
    </div>

    <div class="table-responsive mb-5">
        <table class="table table-borderless text-start">
            <tbody>
                <tr>
                    <th>Nama Tanaman</th>
                    <td>{{ $pendapatan->nama_tanaman }}</td>
                </tr>
                <tr>
                    <th>Periode Penanaman</th>
                    <td>Periode {{ $pendapatan->periode }}</td>
                </tr>
                <tr>
                    <th>Tanggal Penanaman</th>
                    <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
                </tr>
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
                @if($pendapatan->sumber_pendapatan_lainnya)
                <tr>
                    <th>Sumber Pendapatan Lainnya</th>
                    <td>{{ $pendapatan->sumber_pendapatan_lainnya }}</td>
                </tr>
                @endif
                @if($pendapatan->harga)
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($pendapatan->harga, 0, ',', '.') }}</td>
                </tr>
                @endif
                @if($pendapatan->tanggal_pemasukan_lainnya)
                <tr>
                    <th>Tanggal Pemasukan Lainnya</th>
                    <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan_lainnya)->translatedFormat('d F Y') }}</td>
                </tr>
                @endif
                @if($pendapatan->catatan)
                <tr>
                    <th>Catatan</th>
                    <td>{{ $pendapatan->catatan }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center gap-3">
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        <a href="{{ route('pendapatan.create') }}" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endsection
