@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="border p-4 rounded">
        <div class="mb-4">
            <h4 class="fw-bold">Detail Penanaman</h4>
            <hr>
        </div>

        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Nama Tanaman</td>
                    <td class="fw-bold">{{ $penanaman->nama_tanaman }}</td>
                </tr>
                <tr>
                    <td>Lokasi Lahan</td>
                    <td class="fw-bold">{{ $penanaman->lokasi_lahan }}</td>
                </tr>
                <tr>
                    <td>Luas Lahan</td>
                    <td class="fw-bold">{{ $penanaman->luas_lahan }} m</td>
                </tr>
                <tr>
                    <td>Periode Penanaman</td>
                    <td class="fw-bold">{{ $penanaman->periode }}</td>
                </tr>
                <tr>
                    <td>Tanggal Penanaman</td>
                    <td class="fw-bold">{{ \Carbon\Carbon::parse($penanaman->tanggal_penanaman)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Jumlah Pupuk</td>
                    <td class="fw-bold">{{ $penanaman->jumlah_pupuk }} kg</td>
                </tr>
                <tr>
                    <td>Jumlah Bibit</td>
                    <td class="fw-bold">{{ $penanaman->jumlah_bibit }} kg</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('penanaman.index') }}" class="btn btn-success">Kembali</a>

            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn btn-warning">Print</button>
                <a href="{{ route('penanaman.edit', $penanaman->id) }}" class="btn btn-info text-white">Ubah</a>
                <form action="{{ route('penanaman.destroy', $penanaman->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection