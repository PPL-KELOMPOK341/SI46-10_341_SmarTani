@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Berita</h3>
    <a href="{{ route('berita.create') }}" class="btn btn-success mb-3">+ Tambah Data</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
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
            @foreach ($beritas as $no => $berita)
            <tr>
                <td>{{ $no + $beritas->firstItem() }}</td>
                <td>{{ $berita->judul }}</td>
                <td>{{ Str::limit(strip_tags($berita->konten), 50) }}</td>
                <td>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}</td>
                <td>
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/'.$berita->gambar) }}" width="50" />
                    @else
                        <small class="text-muted">-</small>
                    @endif
                </td>
                <td>
                    <a href="{{ route('berita.detail', $berita->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye text-white"></i></a>
                    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit text-white"></i></a>
                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt text-white"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $beritas->links() }}
</div>
@endsection
