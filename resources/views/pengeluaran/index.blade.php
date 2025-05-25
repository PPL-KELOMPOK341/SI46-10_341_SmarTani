@extends('layouts.app')

@section('content')
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Pengeluaran</h2>
        @if(!isset($noPlanting))
            <a href="{{ route('pengeluaran.create') }}" class="btn btn-success">Tambah Pengeluaran</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($noPlanting))
        <div class="alert alert-warning">
            Anda belum memiliki riwayat penanaman. Silakan tambahkan data penanaman terlebih dahulu sebelum mencatat pengeluaran.
            <br>
            <a href="{{ route('penanaman.create') }}" class="btn btn-primary mt-3">Tambah Data Penanaman</a>
        </div>
    @else
        <!-- Search & Sort -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Search Form -->
            <form action="{{ route('pengeluaran.index') }}" method="GET" class="d-flex w-50">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari Nama Tanaman, Periode, atau Tujuan..." />
                <button type="submit" class="btn btn-primary ms-2">Cari</button>
            </form>

            <!-- Sort Buttons -->
            <div class="d-flex justify-content-end align-items-center">
                <!-- Tanggal Pengeluaran -->
                <a href="{{ request()->fullUrlWithQuery([
                    'sort' => 'tanggal',
                    'direction' => request('sort') == 'tanggal' && request('direction') == 'asc' ? 'desc' : 'asc'
                ]) }}" class="btn btn-secondary ms-2">
                    Tanggal Pengeluaran 
                    <i class="fas {{ request('sort') == 'tanggal' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                </a>

                <!-- Nama Tanaman -->
                <a href="{{ request()->fullUrlWithQuery([
                    'sort' => 'tanaman',
                    'direction' => request('sort') == 'tanaman' && request('direction') == 'asc' ? 'desc' : 'asc'
                ]) }}" class="btn btn-secondary ms-2">
                    Nama Tanaman 
                    <i class="fas {{ request('sort') == 'tanaman' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                </a>

                <!-- Periode -->
                <a href="{{ request()->fullUrlWithQuery([
                    'sort' => 'periode',
                    'direction' => request('sort') == 'periode' && request('direction') == 'asc' ? 'desc' : 'asc'
                ]) }}" class="btn btn-secondary ms-2">
                    Periode 
                    <i class="fas {{ request('sort') == 'periode' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tanaman</th>
                        <th>Periode</th>
                        <th>Tanggal Pengeluaran</th>
                        <th>Total Biaya Bibit</th>
                        <th>Total Biaya Pupuk</th>
                        <th>Upah Panen</th>
                        <th>Tujuan Pengeluaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengeluaran as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->penanaman->nama_tanaman }}</td>
                            <td>{{ $item->penanaman->periode }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pengeluaran)->format('d F Y') }}</td>
                            <td>{{ number_format($item->total_biaya_bibit, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->total_biaya_pupuk, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->upah_panen, 0, ',', '.') }}</td>
                            <td>{{ $item->tujuan_pengeluaran }}</td>
                            <td>
                                <a href="{{ route('pengeluaran.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data pengeluaran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif
</main>
@endsection
