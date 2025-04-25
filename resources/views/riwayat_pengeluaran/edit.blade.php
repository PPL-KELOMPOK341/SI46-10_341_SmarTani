@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-green-700">Edit Pengeluaran</h2>

    <form action="{{ route('riwayat.update', $detail->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Nama Tanaman</label>
            <input type="text" name="nama_tanaman" value="{{ $detail->nama_tanaman }}" class="w-full border px-4 py-2 rounded-lg" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Periode</label>
            <input type="text" name="periode" value="{{ $detail->periode }}" class="w-full border px-4 py-2 rounded-lg" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal Penanaman</label>
            <input type="date" name="tanggal_penanaman" value="{{ $detail->tanggal_penanaman }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal Pengeluaran</label>
            <input type="date" name="tanggal_pengeluaran" value="{{ $detail->tanggal_pengeluaran }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">Total Biaya Bibit</label>
            <input type="number" name="total_biaya_bibit" value="{{ $detail->total_biaya_bibit }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">Total Biaya Pupuk</label>
            <input type="number" name="total_biaya_pupuk" value="{{ $detail->total_biaya_pupuk }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">Upah Panen</label>
            <input type="number" name="upah_panen" value="{{ $detail->upah_panen }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">Jumlah Pupuk (kg)</label>
            <input type="number" name="jumlah_pupuk" value="{{ $detail->jumlah_pupuk }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">Jumlah Bibit (kg)</label>
            <input type="number" name="jumlah_bibit" value="{{ $detail->jumlah_bibit }}" class="w-full border px-4 py-2 rounded-lg">
        </div>

        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('riwayat.index') }}" class="bg-gray-300 px-4 py-2 rounded-lg">Batal</a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection