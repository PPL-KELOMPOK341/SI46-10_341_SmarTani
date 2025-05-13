@extends('layouts.app')

@section('content')
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <div class="d-flex justify-content-center align-items-center mb-4">
        <h2>Riwayat Pendapatan</h2>
    </div>

    <!-- Pencarian dan Sort Filter -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Search Form -->
        <form action="{{ route('riwayat_pendapatan.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari Nama, Tanggal, atau Total Hasil..." />
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>

        <!-- Filter & Sort Buttons -->
        <div class="d-flex justify-content-end align-items-center">
            <!-- Tanggal Pemasukan -->
            <a href="{{ route('riwayat_pendapatan.index', ['sort' => 'tanggal', 'direction' => (request('direction') == 'asc' ? 'desc' : 'asc')]) }}" class="btn btn-secondary ms-2">
                Tanggal Pemasukan 
                <i class="fas {{ request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>
            
            <!-- Sumber Pendapatan -->
            <a href="{{ route('riwayat_pendapatan.index', ['sort' => 'pendapatan', 'direction' => (request('direction') == 'asc' ? 'desc' : 'asc')]) }}" class="btn btn-secondary ms-2">
                Sumber Pendapatan 
                <i class="fas {{ request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            <!-- Total Hasil -->
            <a href="{{ route('riwayat_pendapatan.index', ['sort' => 'hasil', 'direction' => (request('direction') == 'asc' ? 'desc' : 'asc')]) }}" class="btn btn-secondary ms-2">
                Total Hasil 
                <i class="fas {{ request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($pendapatans->isEmpty())
        <div class="alert alert-info">
            Belum ada data pendapatan. Silakan tambah data pendapatan baru.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tanaman</th>
                        <th>Periode</th>
                        <th>Sumber Pendapatan</th>
                        <th>Tanggal Pemasukan</th>
                        <th>Total Hasil (Rp)</th>
                        <th>Aksi</th> <!-- Tambahan kolom Aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendapatans as $index => $pendapatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pendapatan->penanaman->nama_tanaman }}</td>
                            <td>{{ $pendapatan->penanaman->periode }}</td>
                            <td>{{ $pendapatan->sumber_pendapatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan)->format('d F Y') }}</td>
                            <td>{{ number_format($pendapatan->total_hasil_pendapatan, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('pendapatan.show', $pendapatan->id) }}" class="btn btn-info btn-sm">
                                    Lihat Detail
                                </a>
                            </td> <!-- Tombol lihat detail -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</main>
@endsection
