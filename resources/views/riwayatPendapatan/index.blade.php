@extends('layouts.app')

@section('content')
<h4 class="mb-4 text-center">Tabel Riwayat Pendapatan</h4>

<div class="mb-4 d-flex flex-column align-items-center gap-3">
    <div class="d-flex flex-wrap justify-content-center gap-2">
        @php
            $toggleOrder = fn($current) => $current == 'asc' ? 'desc' : 'asc';
        @endphp

        <a href="{{ route('riwayat.pendapatan', ['sort_by' => 'tanggal', 'order' => $currentSort === 'tanggal' ? $toggleOrder($currentOrder) : 'asc', 'search' => request('search')]) }}" class="btn btn-outline-primary">
            Tanggal
            @if($currentSort === 'tanggal')
                <i class="fas fa-sort-{{ $currentOrder === 'asc' ? 'up' : 'down' }}"></i>
            @endif
        </a>

        <a href="{{ route('riwayat.pendapatan', ['sort_by' => 'total', 'order' => $currentSort === 'total' ? $toggleOrder($currentOrder) : 'asc', 'search' => request('search')]) }}" class="btn btn-outline-primary">
            Total Hasil
            @if($currentSort === 'total')
                <i class="fas fa-sort-{{ $currentOrder === 'asc' ? 'up' : 'down' }}"></i>
            @endif
        </a>

        <a href="{{ route('riwayat.pendapatan', ['sort_by' => 'sumber', 'order' => $currentSort === 'sumber' ? $toggleOrder($currentOrder) : 'asc', 'search' => request('search')]) }}" class="btn btn-outline-primary">
            Sumber Pendapatan
            @if($currentSort === 'sumber')
                <i class="fas fa-sort-{{ $currentOrder === 'asc' ? 'up' : 'down' }}"></i>
            @endif
        </a>
    </div>

    <form class="d-flex justify-content-center w-100" role="search" method="GET" action="{{ route('riwayat.pendapatan') }}">
        <input class="form-control me-2 w-50" type="search" placeholder="Cari berdasarkan tanggal atau sumber pendapatan" name="search" value="{{ request('search') }}">
        <input type="hidden" name="sort_by" value="{{ $currentSort }}">
        <input type="hidden" name="order" value="{{ $currentOrder }}">
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
                        <td class="px-3"><a href="{{ route('riwayat.pendapatan.detail', $item->id) }}" class="btn btn-success btn-sm">Lihat Detail</a></td>
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
