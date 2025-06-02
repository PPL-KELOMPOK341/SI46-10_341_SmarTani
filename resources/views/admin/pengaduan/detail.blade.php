@extends('admin.layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title mb-4">📝 Detail Pengaduan</h3>

            <div class="row">
                <!-- Informasi Pengirim -->
                <div class="col-md-6 mb-3">
                    <h5>👤 Informasi Pengirim</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nama:</strong> {{ $pengaduan->user->name ?? '-' }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $pengaduan->user->email ?? '-' }}</li>
                        <li class="list-group-item"><strong>Telepon:</strong> {{ $pengaduan->user->phone ?? '-' }}</li>
                    </ul>
                </div>

                <!-- Detail Pengaduan -->
                <div class="col-md-6 mb-3">
                    <h5>📋 Detail Pengaduan</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Kategori:</strong> {{ $pengaduan->kategori }}</li>
                        <li class="list-group-item"><strong>Dibuat Pada:</strong> {{ $pengaduan->created_at->format('d-m-Y H:i') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Deskripsi Pengaduan -->
            <div class="mt-4">
                <h5>📄 Deskripsi Pengaduan</h5>
                <div class="p-3 border rounded bg-light">
                    {!! nl2br(e($pengaduan->deskripsi)) !!}
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-4 d-flex flex-wrap gap-2">
                <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        🗑️ Hapus Pengaduan
                    </button>
                </form>

                <a href="{{ route('pengaduan.riwayat') }}" class="btn btn-outline-secondary ms-auto">
                    ← Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
