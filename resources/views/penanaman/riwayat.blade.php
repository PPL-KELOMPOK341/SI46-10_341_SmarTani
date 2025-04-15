@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tabel Riwayat Penanaman</h4>

    <form method="GET" class="d-flex gap-2 flex-wrap mb-3">
        <select name="nama_tanaman" class="form-control w-auto">
            <option value="">N. Tanaman</option>
            @foreach($penanaman->pluck('nama_tanaman')->unique() as $tanaman)
                <option value="{{ $tanaman }}" {{ request('nama_tanaman') == $tanaman ? 'selected' : '' }}>
                    {{ $tanaman }}
                </option>
            @endforeach
        </select>

        <select name="periode" class="form-control w-auto">
            <option value="">Periode</option>
            @foreach($penanaman->pluck('periode')->unique() as $periode)
                <option value="{{ $periode }}" {{ request('periode') == $periode ? 'selected' : '' }}>
                    {{ $periode }}
                </option>
            @endforeach
        </select>

        <input type="text" name="search" class="form-control w-auto" placeholder="Apa yang Kamu Cari"
               value="{{ request('search') }}">

        <button type="submit" class="btn btn-primary">🔍</button>
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nama Tanaman</th>
                <th>Lokasi Lahan</th>
                <th>Luas Lahan</th>
                <th>Periode Penanaman</th>
                <th>Tanggal Penanaman</th>
                <th>Jumlah Pupuk</th>
                <th>Jumlah Bibit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penanaman as $item)
                <tr>
                    <td>{{ $item->nama_tanaman }}</td>
                    <td>{{ $item->lokasi_lahan }}</td>
                    <td>{{ $item->luas_lahan }} m</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->jumlah_pupuk }} kg</td>
                    <td>{{ $item->jumlah_bibit }} kg</td>
                    <td>
                        <a href="{{ route('penanaman.show', $item->id) }}" class="btn btn-success btn-sm">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection