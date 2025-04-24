@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 30px;">Detail Riwayat Pengeluaran</h2>

    <div style="border-top: 1px dotted #aaa; padding-top: 10px; margin-bottom: 20px;">
        <p><strong>Nama Tanaman</strong><span style="float:right;">{{ $pengeluaran->nama_tanaman }}</span></p>
        <p><strong>Periode Penanaman</strong><span style="float:right;">{{ $pengeluaran->periode }}</span></p>
        <p><strong>Tanggal Penanaman</strong><span style="float:right;">{{ \Carbon\Carbon::parse($pengeluaran->tanggal_penanaman)->translatedFormat('d F Y') }}</span></p>
    </div>

    <div style="border-top: 1px dotted #aaa; padding-top: 10px;">
        <p><strong>Tanggal Pengeluaran</strong><span style="float:right;">{{ \Carbon\Carbon::parse($pengeluaran->tanggal_pengeluaran)->translatedFormat('d F Y') }}</span></p>
        <p><strong>Total Biaya Bibit</strong><span style="float:right;">Rp {{ number_format($pengeluaran->total_biaya_bibit, 0, ',', '.') }}</span></p>
        <p><strong>Total Biaya Pupuk</strong><span style="float:right;">Rp {{ number_format($pengeluaran->total_biaya_pupuk, 0, ',', '.') }}</span></p>
        <p><strong>Upah Panen</strong><span style="float:right;">Rp {{ number_format($pengeluaran->upah_panen, 0, ',', '.') }}</span></p>
        <p><strong>Jumlah Pupuk yang Digunakan</strong><span style="float:right;">{{ $pengeluaran->jumlah_pupuk }} kg</span></p>
        <p><strong>Jumlah Bibit</strong><span style="float:right;">{{ $pengeluaran->jumlah_bibit }} kg</span></p>
    </div>

    <div style="margin-top: 30px;">
        <a href="{{ route('pengeluaran.index') }}" class="btn btn-success">Kembali</a>
        <a href="#" onclick="window.print()" class="btn btn-warning text-white">Print</a>
        <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-info text-white">Ubah</a>
        <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection
