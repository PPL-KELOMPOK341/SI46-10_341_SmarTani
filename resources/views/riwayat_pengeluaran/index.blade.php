@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    

    {{-- Filter --}}
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-2xl font-bold text-green-700 mb-6">Riwayat Pengeluaran</h2>
        <form action="{{ route('riwayat.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama Tanaman" 
                class="border border-gray-300 px-3 py-2 rounded-md focus:ring focus:ring-green-200 focus:outline-none">
            
            <select name="periode" class="border border-gray-300 px-3 py-2 rounded-md focus:ring focus:ring-green-200 focus:outline-none">
                <option value="">Pilih Periode</option>
                @foreach($periodes as $periode)
                    <option value="{{ $periode }}" {{ request('periode') == $periode ? 'selected' : '' }}>
                        {{ $periode }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}"
            class="border border-gray-300 px-3 py-2 rounded-md focus:ring focus:ring-green-200 focus:outline-none">
            <span class="text-gray-500">s/d</span>
            <input type="date" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}"
            class="border border-gray-300 px-3 py-2 rounded-md focus:ring focus:ring-green-200 focus:outline-none">


            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-md">
                Filter
            </button>
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white p-4 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-700 border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr class="text-center">
                        <th class="px-3 py-2 border">No</th>
                        <th class="px-3 py-2 border">Nama Tanaman</th>
                        <th class="px-3 py-2 border">Periode</th>
                        <th class="px-3 py-2 border">Tanggal Penanaman</th>
                        <th class="px-3 py-2 border">Tanggal Pengeluaran</th>
                        <th class="px-3 py-2 border">Biaya Bibit</th>
                        <th class="px-3 py-2 border">Biaya Pupuk</th>
                        <th class="px-3 py-2 border">Upah Panen</th>
                        <th class="px-3 py-2 border">Total</th>
                        <th class="px-3 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($data as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-3 py-2 border">{{ $item->nama_tanaman }}</td>
                        <td class="px-3 py-2 border">{{ $item->periode }}</td>
                        <td class="px-3 py-2 border">{{ \Carbon\Carbon::parse($item->tanggal_penanaman)->translatedFormat('d F Y') }}</td>
                        <td class="px-3 py-2 border">{{ \Carbon\Carbon::parse($item->tanggal_pengeluaran)->translatedFormat('d F Y') }}</td>
                        <td class="px-3 py-2 border">Rp {{ number_format($item->total_biaya_bibit, 0, ',', '.') }}</td>
                        <td class="px-3 py-2 border">Rp {{ number_format($item->total_biaya_pupuk, 0, ',', '.') }}</td>
                        <td class="px-3 py-2 border">Rp {{ number_format($item->upah_panen, 0, ',', '.') }}</td>
                        <td class="px-3 py-2 border font-bold text-green-700">
                            Rp {{ number_format($item->total_biaya_bibit + $item->total_biaya_pupuk + $item->upah_panen, 0, ',', '.') }}
                        </td>
                        <td class="px-3 py-2 border">
                            <a href="{{ route('riwayat.show', $item->id) }}" 
                               class="bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-4 py-2 rounded-md">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="px-3 py-4 text-gray-500">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection