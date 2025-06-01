@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3 class="text-2xl font-bold mb-4 text-center">Data Berita</h3>

    {{-- Baris Tombol Tambah + Filter --}}
    <div class="row align-items-center mb-3">
        {{-- Kolom Tombol Tambah --}}
        <div class="col-md-3 text-md-start text-center mb-2 mb-md-0">
            <a href="{{ route('berita.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>

        {{-- Kolom Filter --}}
        <div class="col-md-9">
            <form method="GET" class="d-flex flex-wrap justify-content-start gap-2 ps-md-5">
                <input type="date" name="dari" value="{{ request('dari') }}" class="form-control p-2 border rounded" style="max-width: 160px;">
                <input type="date" name="sampai" value="{{ request('sampai') }}" class="form-control p-2 border rounded" style="max-width: 160px;">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control p-2 border rounded" placeholder="Apa yang Kamu Cari" style="max-width: 200px;">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
    </div>

    {{-- Flash Message Cancel --}}
    @if(session('cancel_message'))
        <div class="alert alert-warning text-center mb-3">
            {{ session('cancel_message') }}
        </div>
    @endif

    {{-- Flash Message Success --}}
    @if(session('success'))
        <div class="alert alert-success text-center mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $no => $berita)
                    <tr>
                        <td>{{ $no + $beritas->firstItem() }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ Str::limit(strip_tags($berita->konten), 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}</td>
                        <td>
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" width="50" class="img-thumbnail" />
                            @else
                                <small class="text-muted">-</small>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('berita.detail', $berita->id) }}" class="btn btn-info btn-sm" dusk="lihat-{{ $berita->id }}">
                                <i class="fas fa-eye text-white"></i>
                            </a>

                            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit text-white"></i>
                            </a>

                            <button onclick="konfirmasiHapus({{ $berita->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt text-white"></i>
                            </button>

                            <form id="form-hapus-{{ $berita->id }}" action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data berita</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $beritas->links() }}
    </div>
</div>

{{-- Konfirmasi Hapus --}}
<script>
    function konfirmasiHapus(id) {
        if (confirm("Apakah Anda yakin ingin menghapus berita ini?")) {
            document.getElementById('form-hapus-' + id).submit();
        } else {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('cancel', 'true');
            window.location.href = currentUrl.toString();
        }
    }
</script>
@endsection
