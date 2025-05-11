@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Hasil Panen</h2>
        @if(!isset($noPlanting))
            <a href="{{ route('hasil-panen.create') }}" class="tambah-hasil-panen btn btn-success">Tambah Hasil Panen</a>
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
                                <th>Nama Tanaman</th>
                                <th>Lokasi Lahan</th>
                                <th>Harga Jual Per kg</th>
                                <th>Tanggal Panen</th>
                                <th>Jumlah Hasil Panen</th>
                                <th>Kualitas Hasil Panen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($hasilPanen as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->penanaman->nama_tanaman }}</td>
                                    <td>{{ $item->penanaman->lokasi_lahan }}</td>
                                    <td>{{ $item->harga_jual_satuan }}</td>
                                    <td>{{ $item->tanggal_panen->format('d/m/Y') }}</td>
                                    <td>{{ $item->jumlah_hasil_panen }}</td>
                                    <td>{{ $item->kualitas_hasil_panen }}</td>
                                    <td>
                                        <a href="{{ route('hasil-panen.show', $item->id) }}" class="btn-detail-panen btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('hasil-panen.edit', $item->id) }}" class="btn-edit-panen btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('hasil-panen.destroy', $item->id) }}" method="POST" class="d-inline">
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
