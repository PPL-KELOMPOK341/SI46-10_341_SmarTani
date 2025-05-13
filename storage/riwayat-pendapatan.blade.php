@extends('layouts.app')

@section('content')
<main class="flex-grow-1 p-4 bg-white overflow-auto">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Pendapatan</h2>
        <a href="{{ route('pendapatan.create') }}" class="btn btn-primary">Tambah Pendapatan</a>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendapatans as $index => $pendapatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pendapatan->penanaman->nama_tanaman }}</td>
                            <td>{{ $pendapatan->penanaman->periode }}</td>
                            <td>{{ $pendapatan->sumber_pendapatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan)->format('d/m/Y') }}</td>
                            <td>{{ number_format($pendapatan->total_hasil_pendapatan, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</main>
@endsection
