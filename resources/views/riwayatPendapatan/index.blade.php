@extends('layouts.app')

@section('content')
<h4 class="mb-4">Tabel Riwayat Pendapatan</h4>

<div class="mb-3 d-flex gap-2">
    <button class="btn btn-outline-secondary">Urutkan</button>
    <button class="btn btn-outline-secondary">N. Tanaman</button>
    <button class="btn btn-outline-secondary">Periode</button>
    <form class="d-flex ms-auto" role="search" method="GET" action="{{ route('riwayat.pendapatan') }}">
        <input class="form-control me-2" type="search" placeholder="Apa yang Kamu Cari" aria-label="Search" name="search">
        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

<div class="container">
    <div class="card shadow-sm rounded overflow-auto">
        <div class="table-responsive">
            <table class="table table-bordered text-center w-100 mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th class="px-3">Tanggal Pemasukan</th>
                        <th class="px-3">Total Hasil Pendapatan</th>
                        <th class="px-3">Sumber Pendapatan</th>
                        <th class="px-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $item)
                    <tr>
                        <td class="px-3">{{ \Carbon\Carbon::parse($item->tanggal_pemasukan)->translatedFormat('d F Y') }}</td>
                        <td class="px-3">Rp {{ number_format($item->total_hasil_pendapatan, 0, ',', '.') }}</td>
                        <td class="px-3">{{ $item->sumber_pendapatan }}</td>
                        <td class="px-3"><a href="#" class="btn btn-success btn-sm">Lihat Detail</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Belum ada data riwayat pendapatan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
