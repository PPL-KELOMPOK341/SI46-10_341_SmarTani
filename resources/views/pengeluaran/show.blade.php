@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Detail Pengeluaran</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th style="width: 200px">Nama Tanaman</th>
                            <td>{{ $pengeluaran->penanaman->nama_tanaman }}</td>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <td>{{ $pengeluaran->penanaman->periode }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penanaman</th>
                            <td>{{ $pengeluaran->penanaman->tanggal_penanaman->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Total Biaya Bibit</th>
                            <td>Rp. {{ number_format($pengeluaran->total_biaya_bibit, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Upah Panen</th>
                            <td>Rp. {{ number_format($pengeluaran->upah_panen, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Biaya Pupuk</th>
                            <td>Rp. {{ number_format($pengeluaran->total_biaya_pupuk, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th style="width: 200px">Jumlah Pupuk</th>
                            <td>{{ $pengeluaran->jumlah_pupuk }} kg</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengeluaran</th>
                            <td>{{ $pengeluaran->tanggal_pengeluaran->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bibit</th>
                            <td>{{ $pengeluaran->jumlah_bibit }} kg</td>
                        </tr>
                        <tr>
                            <th>Tujuan Pengeluaran</th>
                            <td>{{ $pengeluaran->tujuan_pengeluaran }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp. {{ number_format($pengeluaran->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>{{ $pengeluaran->catatan ?: '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
                <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
