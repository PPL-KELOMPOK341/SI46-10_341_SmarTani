@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Berita Terkini</h1>

        {{-- Search and Filter Section --}}
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8">
            <form method="GET" class="d-flex flex-wrap gap-2 align-items-center justify-content-start">

                    <input type="date" name="dari" value="{{ request('dari') }}" class="form-control" placeholder="Dari" style="width: auto;">
                    <input type="date" name="sampai" value="{{ request('sampai') }}" class="form-control" placeholder="Sampai" style="width: auto;">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Apa yang Kamu Cari" style="width: auto;">

                    <button type="submit" class="btn btn-outline-secondary d-flex align-items-center justify-content-center" style="width: 40px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242 1.106a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
                        </svg>
                    </button>

                        <a href="https://www.bmkg.go.id/" target="_blank" class="btn btn-success ms-2 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-sun me-1" viewBox="0 0 16 16">
                                <path d="M7 8a3.5 3.5 0 0 1 3.5 3.555.5.5 0 0 0 .624.492A1.503 1.503 0 0 1 13 13.5a1.5 1.5 0 0 1-1.5 1.5H3a2 2 0 1 1 .1-3.998.5.5 0 0 0 .51-.375A3.502 3.502 0 0 1 7 8zm4.473 3a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5h-.027z"/>
                                <path d="M10.5 1.5a.5.5 0 0 0-1 0v1a.5.5 0 0 0 1 0v-1zm3.743 1.964a.5.5 0 1 0-.707-.707l-.708.707a.5.5 0 0 0 .708.708l.707-.708zm-7.779-.707a.5.5 0 0 0-.707.707l.707.708a.5.5 0 1 0 .708-.708l-.708-.707zm1.734 3.374a2 2 0 1 1 3.296 2.198c.199.281.372.582.516.898a3 3 0 1 0-4.84-3.225c.352.011.696.055 1.028.129zm4.484 4.074c.6.215 1.125.59 1.522 1.072a.5.5 0 0 0 .039-.742l-.707-.707a.5.5 0 0 0-.854.377zM14.5 6.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                            </svg>
                            Cuaca
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
    @forelse ($beritas as $berita)
        <div class="col-md-4 mb-4 d-flex">
            <a href="{{ route('berita.show-petani', $berita->id) }}" class="text-decoration-none text-dark w-100">
                <div class="card border-0 shadow-sm h-100">
                    @if(!empty($berita['gambar']))
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="Gambar Berita" style="object-fit: cover; height: 200px;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita['judul'] }}</h5>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($berita['tanggal'])->translatedFormat('d F Y') }}</p>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($berita['isi'], 200) }}</p>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <p class="text-center">Tidak ada berita ditemukan.</p>
    @endforelse
</div>

    </div>
@endsection