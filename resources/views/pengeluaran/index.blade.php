@extends('layouts.app')

@section('content')
<div class="container mt-4">
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
            Anda belum memiliki riwayat penanaman. Silahkan tambahkan data penanaman terlebih dahulu sebelum mencatat pengeluaran.
            <br>
            <a href="{{ route('penanaman.create') }}" class="btn btn-primary mt-3">Tambah Data Penanaman</a>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Tanaman</th>
                                <th>Periode</th>
                                <th>Total Biaya Bibit</th>
                                <th>Total Biaya Pupuk</th>
                                <th>Upah Panen</th>
                                <th>Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengeluaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal_pengeluaran->format('d/m/Y') }}</td>
                                    <td>{{ $item->penanaman->nama_tanaman }}</td>
                                    <td>{{ $item->penanaman->periode }}</td>
                                    <td>Rp. {{ number_format($item->total_biaya_bibit, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($item->total_biaya_pupuk, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($item->upah_panen, 0, ',', '.') }}</td>
                                    <td>{{ $item->tujuan_pengeluaran }}</td>
                                    <td>
                                        <a href="{{ route('pengeluaran.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
            </div>
        </div>
    @endif
</div>
@endsection
