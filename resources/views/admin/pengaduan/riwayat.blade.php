@extends('admin.layouts.app')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Riwayat Pengaduan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Search dan Filter --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama atau kategori...">
        </div>
        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Dalam Proses" {{ request('status') == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="col-md-2">
        <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" placeholder="Dari Tanggal">
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        <span class="fw-semibold">s/d</span>
        </div>
        <div class="col-md-2">
        <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" placeholder="Sampai Tanggal">
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-success w-20">Filter</button>
        </div>
        <div class="col-md-1">
        <a href="{{ route('pengaduan.riwayat') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
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
                        @forelse($pengaduans as $key => $item)
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
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada pengaduan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $pengaduans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
