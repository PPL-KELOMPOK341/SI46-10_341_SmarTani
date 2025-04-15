@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4">Tabel Riwayat Pengeluaran</h3>

    {{-- Filter dan Pencarian --}}
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex gap-2">
            <button class="btn btn-outline-success rounded-pill px-4">Urutkan</button>
            <button class="btn btn-outline-success rounded-pill px-4">Nama Tanaman</button>
            <button class="btn btn-outline-success rounded-pill px-4">Periode</button>
        </div>
        <input type="text" class="form-control w-25 rounded-pill px-3" placeholder="Apa yang Kamu Cari">
    </div>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-success text-center">
                <tr>
                    <th>Tanggal Pengeluaran</th>
                    <th>Total Biaya Bibit</th>
                    <th>Total Biaya Pupuk</th>
                    <th>Upah Panen</th>
                    <th>Jumlah Pupuk</th>
                    <th>Jumlah Bibit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($data as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengeluaran)->translatedFormat('d F Y') }}</td>
                    <td>Rp {{ number_format($item->biaya_bibit, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->biaya_pupuk, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->upah_panen, 0, ',', '.') }}</td>
                    <td>{{ $item->jumlah_pupuk }} kg</td>
                    <td>{{ $item->jumlah_bibit }} kg</td>
                    <td>
                        <a href="{{ route('riwayat.show', $item->id) }}" class="btn btn-success btn-sm px-3 rounded-pill">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
