@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold ">Riwayat Pengaduan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Search dan Filter --}}
    <form method="GET" class="mb-4 filter-form">
    <div class="row g-2 align-items-end">
        <div class="col-md-3">
            <label for="search" class="form-label fw-semibold">Cari</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control rounded-3 shadow-sm" placeholder="Nama, Kategori, Status...">
        </div>
        <div class="col-md-3">
            <label for="start_date" class="form-label fw-semibold">Dari Tanggal</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="form-control rounded-3 shadow-sm">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label fw-semibold">Sampai Tanggal</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="form-control rounded-3 shadow-sm">
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-3 px-4 shadow-sm">
                <i class="bi bi-search"></i> Filter
            </button>
            <a href="{{ route('pengaduan.riwayat') }}" class="btn btn-outline-secondary rounded-3 px-4 shadow-sm">
                <i class="bi bi-x-circle"></i> Reset
            </a>
        </div>
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
                            <td>{{ $item->user->name }}</td>
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
