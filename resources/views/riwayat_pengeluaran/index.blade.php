@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-green-700 mb-6">Riwayat Pengeluaran</h2>

    {{-- Filter dan Pencarian --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="flex gap-2">
            <button class="border border-green-500 text-green-600 px-4 py-1 rounded-full hover:bg-green-100 text-sm">Urutkan</button>
            <button class="border border-green-500 text-green-600 px-4 py-1 rounded-full hover:bg-green-100 text-sm">Nama Tanaman</button>
            <button class="border border-green-500 text-green-600 px-4 py-1 rounded-full hover:bg-green-100 text-sm">Periode</button>
        </div>
        <input type="text" placeholder="Cari sesuatu..." class="w-full md:w-1/3 border border-gray-300 px-4 py-2 rounded-full shadow-sm focus:ring focus:ring-green-200 focus:outline-none">
    </div>

    {{-- Tabel Data --}}
    <div class="overflow-auto bg-white shadow-md rounded-xl">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-green-100 text-green-800 text-center">
                <tr>
                    <th class="px-4 py-3">Nama Tanaman</th>
                    <th class="px-4 py-3">Periode</th>
                    <th class="px-4 py-3">Tanggal Penanaman</th>
                    <th class="px-4 py-3">Tanggal Pengeluaran</th>
                    <th class="px-4 py-3">Biaya Bibit</th>
                    <th class="px-4 py-3">Biaya Pupuk</th>
                    <th class="px-4 py-3">Upah Panen</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($data as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $item->nama_tanaman }}</td>
                    <td class="px-4 py-3">{{ $item->periode }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($item->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($item->tanggal_pengeluaran)->translatedFormat('d F Y') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($item->total_biaya_bibit, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($item->total_biaya_pupuk, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($item->upah_panen, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 font-semibold text-green-700">
                        Rp {{ number_format($item->total_biaya_bibit + $item->total_biaya_pupukbiaya_pupuk + $item->upah_panen, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3">
                    <a href="{{ route('riwayat.show', $item->id) }}" class="bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-4 py-2 rounded-full transition">Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@if(session('success'))
    <div id="alert-success" class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm transition-opacity duration-300">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 300); // Hapus dari DOM setelah fade out
            }
        }, 3000); // 3 detik
    </script>
@endif
