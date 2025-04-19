@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        @if(!empty($berita['gambar']))
            <img src="{{ asset('storage/' . $berita['gambar']) }}" class="card-img-top" alt="Gambar Berita">
        @endif
        <div class="card-body">
            <h2 class="card-title">{{ $berita['judul'] }}</h2>
            <p class="text-muted">{{ \Carbon\Carbon::parse($berita['tanggal'])->translatedFormat('d F Y') }}</p>
            <p class="card-text">{{ $berita['isi'] }}</p>
        </div>
    </div>
</div>
@endsection
