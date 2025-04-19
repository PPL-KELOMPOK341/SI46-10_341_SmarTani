@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4 text-green-700">Form Pengeluaran Pertanian</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengeluaran.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Nama Tanaman</label>
            <input type="text" name="nama_tanaman" class="w-full border border-gray-300 rounded-md p-2" placeholder="Contoh: Cabai Merah">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Periode</label>
            <input type="text" name="periode" class="w-full border border-gray-300 rounded-md p-2" placeholder="Contoh: Januari - Maret">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Tanggal Penanaman</label>
            <input type="date" name="tanggal_penanaman" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Tanggal Pengeluaran</label>
            <input type="date" name="tanggal_pengeluaran" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Jumlah Bibit (Kg/L)</label>
            <input type="number" name="jumlah_bibit" class="w-full border border-gray-300 rounded-md p-2" step="0.01">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Total Biaya Bibit (Rp)</label>
            <input type="number" name="total_biaya_bibit" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Jumlah Pupuk (Kg/L)</label>
            <input type="number" name="jumlah_pupuk" class="w-full border border-gray-300 rounded-md p-2" step="0.01">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Total Biaya Pupuk (Rp)</label>
            <input type="number" name="total_biaya_pupuk" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 mb-1">Upah Panen (Rp)</label>
            <input type="number" name="upah_panen" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
