@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top img-fluid rounded" style="max-height: 300px; object-fit: cover;" alt="{{ $berita->judul }}">
                @endif
                <div class="card-body">
                    <h2 class="card-title mb-3">{{ $berita->judul }}</h2>
                    <p class="text-muted mb-4">{{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</p>
                    <div class="card-text">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection