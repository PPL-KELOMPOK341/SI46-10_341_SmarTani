@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <legend class="mb-3">CARI DATA PENANAMAN</legend>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('hasil-panen.search') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Nama Tanaman <span class="text-danger">*</span></label>
                            <input type="text" name="nama_tanaman" class="form-control" value="{{ old('nama_tanaman') }}" placeholder="Masukkan nama tanaman yang sudah ada di riwayat penanaman" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cari Tanaman</button>
                <a href="{{ route('hasil-panen.index') }}" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
