@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Riwayat Pengaduan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Nama User</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduans as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status == 'Selesai' ? 'success' : ($item->status == 'Dalam Proses' ? 'warning' : 'secondary') }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('pengaduan.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada pengaduan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
