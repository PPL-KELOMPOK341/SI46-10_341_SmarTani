@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Print Detail Pendapatan</h2>
        
        <hr>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Nama Tanaman</strong>
            </div>
            <div class="col-md-6 text-end">
                {{ $pendapatan->penanaman->nama_tanaman }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Periode Penanaman</strong>
            </div>
            <div class="col-md-6 text-end">
                {{ $pendapatan->penanaman->periode_penanaman }}
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Tanggal Penanaman</strong>
            </div>
            <div class="col-md-6 text-end">
                {{ \Carbon\Carbon::parse($pendapatan->penanaman->tanggal_penanaman)->format('d M Y') }}
            </div>
        </div>

        <hr>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Tanggal Pemasukan</strong>
            </div>
            <div class="col-md-6 text-end">
                {{ \Carbon\Carbon::parse($pendapatan->tanggal_pemasukan)->format('d M Y') }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Total Hasil Pendapatan</strong>
            </div>
            <div class="col-md-6 text-end">
                Rp {{ number_format($pendapatan->total_hasil_pendapatan, 0, ',', '.') }}
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Sumber Pendapatan</strong>
            </div>
            <div class="col-md-6 text-end">
                {{ $pendapatan->sumber_pendapatan }}
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('riwayat_pendapatan.index') }}" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>
@endsection
