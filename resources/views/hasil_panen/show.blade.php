@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="border p-4 rounded">
        <div class="mb-4">
            <h4 class="fw-bold">Detail Hasil Panen</h4>
            <hr>
        </div>

        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Nama Tanaman</td>
                    <td class="fw-bold">{{ $hasilPanen->penanaman->nama_tanaman }}</td>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td class="fw-bold">{{ $hasilPanen->penanaman->periode }}</td>
                </tr>
                <tr>
                    <td>Tanggal Penanaman</td>
                    <td class="fw-bold">{{ $hasilPanen->penanaman->tanggal_penanaman->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Lokasi Lahan</td>
                    <td class="fw-bold">{{ $hasilPanen->penanaman->lokasi_lahan }}</td>
                </tr>
                <tr>
                    <td>Harga Jual Per KG</td>
                    <td class="fw-bold">Rp. {{ number_format($hasilPanen->harga_jual_satuan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Tanggal Panen</td>
                    <td class="fw-bold">{{ $hasilPanen->tanggal_panen->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Jumlah hasil Panen</td>
                    <td class="fw-bold">Rp. {{ number_format($hasilPanen->jumlah_hasil_panen, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Kualitas Hasil Panen</td>
                    <td class="fw-bold">{{ $hasilPanen->kualitas_hasil_panen }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('hasil-panen.index') }}" class="btn-kembali btn btn-success">Kembali</a>

            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn btn-warning">Print</button>
                <a href="{{ route('hasil-panen.edit', $hasilPanen->id) }}" class="btn btn-info text-white">Ubah</a>
                <form action="{{ route('hasil-panen.destroy', $hasilPanen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection