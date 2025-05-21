@extends('layouts.app')

@section('content')
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Pendapatan</h2>
        <a href="{{ route('pendapatan.create') }}" class="btn btn-success">Tambah Pendapatan</a>
    </div>

    {{-- Search dan Sort --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- Form Search --}}
        <form action="{{ route('riwayat_pendapatan.index') }}" method="GET" class="d-flex w-50">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                class="form-control" 
                placeholder="Cari Nama, Tanggal, atau Total Hasil..."
            />
            {{-- Hidden Inputs untuk jaga sort dan direction --}}
            <input type="hidden" name="sort" value="{{ request('sort') }}">
            <input type="hidden" name="direction" value="{{ request('direction') }}">
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>

        {{-- Tombol Sort --}}
        <div class="d-flex justify-content-end align-items-center">
            {{-- Tanggal Pemasukan --}}
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'tanggal',
                'direction' => request('sort') == 'tanggal' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Tanggal Pemasukan 
                <i class="fas {{ request('sort') == 'tanggal' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            {{-- Sumber Pendapatan --}}
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'pendapatan',
                'direction' => request('sort') == 'pendapatan' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Sumber Pendapatan 
                <i class="fas {{ request('sort') == 'pendapatan' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            {{-- Total Hasil --}}
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'hasil',
                'direction' => request('sort') == 'hasil' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Total Hasil 
                <i class="fas {{ request('sort') == 'hasil' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>
        </div>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tampilkan Tabel atau Info --}}
    @if ($pendapatans->isEmpty())
        <div class="alert alert-info">
            Belum ada data pendapatan. Silakan tambah data terlebih dahulu.
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendapatans as $index => $pendapatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pendapatan->penanaman->nama_tanaman ?? '-' }}</td>
                            <td>{{ $pendapatan->penanaman->periode ?? '-' }}</td>
                            <td>{{ $pendapatan->sumber_pendapatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan)->format('d F Y') }}</td>
                            <td>{{ number_format($pendapatan->total_hasil_pendapatan, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('pendapatan.show', $pendapatan->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('pendapatan.edit', $pendapatan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pendapatan.destroy', $pendapatan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</main>
@endsection
