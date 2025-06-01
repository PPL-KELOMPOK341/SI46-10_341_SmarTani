@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="text-2xl font-bold mb-4">Detail Berita</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h3 class="fw-bold">{{ $berita->judul }}</h3>
                <p class="text-muted">
                    <i class="bi bi-calendar"></i>
                    {{ $berita->tanggal ? \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') : 'Tanggal tidak tersedia' }}
                </p>
                <div class="content mt-3">
                    {!! nl2br(e($berita->konten)) !!}
                </div>
            </div>
            <div class="col-md-4">
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded">
                @else
                    <div class="alert alert-info">Tidak ada gambar</div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
        <small class="text-muted">
            Dibuat: {{ $berita->created_at ? $berita->created_at->format('d M Y H:i') : '-' }} |
            Diperbarui: {{ $berita->updated_at ? $berita->updated_at->format('d M Y H:i') : '-' }}
        </small>
        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
    </div>
</div>
@endsection
