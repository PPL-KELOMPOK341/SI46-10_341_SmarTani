@extends('layouts.main')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-lg mt-10">
    <h1 class="text-2xl font-bold text-center text-green-700 mb-8">Hasil Pengeluaran</h1>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-green-100 text-green-800">
                <tr>
                    <th class="border p-3 text-left">Nama Tanaman</th>
                    <th class="border p-3 text-left">Periode</th>
                    <th class="border p-3 text-left">Tgl Penanaman</th>
                    <th class="border p-3 text-left">Tgl Pengeluaran</th>
                    <th class="border p-3 text-left">Jumlah Bibit</th>
                    <th class="border p-3 text-left">Biaya Bibit</th>
                    <th class="border p-3 text-left">Jumlah Pupuk</th>
                    <th class="border p-3 text-left">Biaya Pupuk</th>
                    <th class="border p-3 text-left">Upah Panen</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr class="hover:bg-green-50">
                    <td class="border p-3">{{ $item->nama_tanaman }}</td>
                    <td class="border p-3">{{ $item->periode }}</td>
                    <td class="border p-3">{{ $item->tanggal_penanaman }}</td>
                    <td class="border p-3">{{ $item->tanggal_pengeluaran }}</td>
                    <td class="border p-3">{{ $item->jumlah_bibit }}</td>
                    <td class="border p-3">Rp {{ number_format($item->total_biaya_bibit, 0, ',', '.') }}</td>
                    <td class="border p-3">{{ $item->jumlah_pupuk }}</td>
                    <td class="border p-3">Rp {{ number_format($item->total_biaya_pupuk, 0, ',', '.') }}</td>
                    <td class="border p-3">Rp {{ number_format($item->upah_panen, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center p-4 text-gray-500">Belum ada data pengeluaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center mt-6">
        <a href="/pengeluaran/create" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full shadow">
            Tambah Data Lagi
        </a>
    </div>
</div>
@endsection
