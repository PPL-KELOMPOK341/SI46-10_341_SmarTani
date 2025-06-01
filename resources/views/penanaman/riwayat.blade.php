@extends('layouts.app')

@section('content')
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Penanaman</h2>
        <a href="{{ route('penanaman.create') }}" class="btn btn-success">Tambah Penanaman</a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search & Sort -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Search Form -->
        <form action="{{ route('penanaman.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari Nama Tanaman, Periode..." />
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>

        <!-- Sort Buttons -->
        <div class="d-flex justify-content-end align-items-center">
            <!-- Periode -->
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'periode',
                'direction' => request('sort') == 'periode' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Periode
                <i class="fas {{ request('sort') == 'periode' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            <!-- Nama Tanaman -->
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'nama_tanaman',
                'direction' => request('sort') == 'nama_tanaman' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Nama Tanaman
                <i class="fas {{ request('sort') == 'nama_tanaman' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            <!-- Tanggal Penanaman -->
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'tanggal_penanaman',
                'direction' => request('sort') == 'tanggal_penanaman' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Tanggal Penanaman
                <i class="fas {{ request('sort') == 'tanggal_penanaman' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
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
                    <th>Lokasi Lahan</th>
                    <th>Luas Lahan (m²)</th>
                    <th>Tanggal Penanaman</th>
                    <th>Jumlah Pupuk (kg)</th>
                    <th>Jumlah Bibit (kg)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penanaman as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_tanaman }}</td>
                        <td>{{ $item->periode }}</td>
                        <td>{{ $item->lokasi_lahan }}</td>
                        <td>{{ $item->luas_lahan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->jumlah_pupuk }}</td>
                        <td>{{ $item->jumlah_bibit }}</td>
                        <td>
                            <a href="{{ route('penanaman.lihat-detail', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('penanaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penanaman.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data penanaman</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
