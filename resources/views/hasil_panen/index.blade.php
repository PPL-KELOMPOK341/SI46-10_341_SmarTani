@extends('layouts.app')

@section('content')
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Hasil Panen</h2>
        <a href="{{ route('hasil-panen.create') }}" class="btn btn-success">Tambah Hasil Panen</a>
    </div>

    {{-- Search dan Filter --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- Form Search --}}
        <form action="{{ route('hasil-panen.index') }}" method="GET" class="d-flex w-50">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                class="form-control" 
                placeholder="Cari Nama Tanaman, Kualitas, atau Tanggal Panen..." 
            />
            {{-- Menyimpan sort dan direction --}}
            <input type="hidden" name="sort" value="{{ request('sort') }}">
            <input type="hidden" name="direction" value="{{ request('direction') }}">
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>

        {{-- Sort --}}
        <div class="d-flex justify-content-end align-items-center">
            {{-- Tanggal Panen --}}
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'tanggal',
                'direction' => request('sort') == 'tanggal' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Tanggal Panen 
                <i class="fas {{ request('sort') == 'tanggal' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            {{-- Kualitas --}}
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'kualitas',
                'direction' => request('sort') == 'kualitas' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Kualitas 
                <i class="fas {{ request('sort') == 'kualitas' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>

            {{-- Jumlah Panen --}}
            <a href="{{ request()->fullUrlWithQuery([
                'sort' => 'jumlah',
                'direction' => request('sort') == 'jumlah' && request('direction') == 'asc' ? 'desc' : 'asc'
            ]) }}" class="btn btn-secondary ms-2">
                Jumlah Panen 
                <i class="fas {{ request('sort') == 'jumlah' && request('direction') == 'asc' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
            </a>
        </div>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Jika belum ada data penanaman --}}
    @if (isset($noPlanting) && $noPlanting)
        <div class="alert alert-warning">
            Anda belum memiliki data penanaman. Silakan isi data penanaman terlebih dahulu.
        </div>

    {{-- Jika belum ada hasil panen --}}
    @elseif($hasilPanen->isEmpty())
        <div class="alert alert-info">
            Belum ada data hasil panen. Silakan tambah hasil panen terlebih dahulu.
        </div>

    {{-- Tampilkan tabel --}}
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tanaman</th>
                        <th>Periode</th>
                        <th>Tanggal Panen</th>
                        <th>Jumlah Panen</th>
                        <th>Harga Jual</th>
                        <th>Kualitas</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasilPanen as $index => $hasil)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $hasil->penanaman->nama_tanaman ?? '-' }}</td>
                            <td>{{ $hasil->penanaman->periode ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($hasil->tanggal_panen)->format('d F Y') }}</td>
                            <td>{{ $hasil->jumlah_hasil_panen }}</td>
                            <td>Rp {{ number_format($hasil->harga_jual_satuan, 0, ',', '.') }}</td>
                            <td>{{ $hasil->kualitas_hasil_panen }}</td>
                            <td>{{ $hasil->catatan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('hasil-panen.show', $hasil->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('hasil-panen.edit', $hasil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('hasil-panen.destroy', $hasil->id) }}" method="POST" class="d-inline">
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
