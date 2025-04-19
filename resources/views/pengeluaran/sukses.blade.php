@extends('layouts.app')

@section('content')
<div class="bg-green-100 p-6 rounded-lg shadow-lg">
    <div class="flex items-center space-x-4">
        <div class="text-green-600">
            <i class="fas fa-check-circle text-3xl"></i>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-green-700">Data Pengeluaran Berhasil Ditambahkan</h2>
            <p class="text-gray-700">Pengeluaran untuk tanaman {{ $pengeluaran->nama_tanaman }} pada periode {{ $pengeluaran->periode }} telah berhasil disimpan.</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('pengeluaran.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Tambah Pengeluaran Lagi</a>
        <a href="{{ route('pengeluaran.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 ml-4">Lihat Daftar Pengeluaran</a>
    </div>
</div>
@endsection
