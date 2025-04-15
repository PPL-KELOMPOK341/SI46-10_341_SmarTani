@extends('layouts.app')

@section('content')
    <h2 class="text-center fw-bold mb-4">Berita Terkini</h2>

    <form method="GET" class="row g-2 mb-4 justify-content-center">
        <div class="col-md-2">
            <input type="date" name="dari" value="{{ request('dari') }}" class="form-control" placeholder="Dari">
        </div>
        <div class="col-md-2">
            <input type="date" name="sampai" value="{{ request('sampai') }}" class="form-control" placeholder="Sampai">
        </div>
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Apa yang kamu cari?">
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-outline-primary w-100">🔍</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @forelse ($beritas as $berita)
            <div class="col">
                <div class="card shadow-sm h-100">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="Gambar Berita">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="Default">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita->judul }}</h5>
                        <p class="text-muted mb-0">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Tidak ada berita ditemukan.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $beritas->withQueryString()->links() }}
    </div>
@endsection
