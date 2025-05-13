@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Edit Pendapatan</h2>

        <form action="{{ route('pendapatan.update', $pendapatan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="penanaman_id" class="form-label">Nama Tanaman</label>
                <select name="penanaman_id" id="penanaman_id" class="form-select @error('penanaman_id') is-invalid @enderror" required>
                    <option value="">Pilih Tanaman</option>
                    @foreach($penanamans as $penanaman)
                        <option value="{{ $penanaman->id }}" {{ $pendapatan->penanaman_id == $penanaman->id ? 'selected' : '' }}>
                            {{ $penanaman->nama_tanaman }}
                        </option>
                    @endforeach
                </select>
                @error('penanaman_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sumber_pendapatan" class="form-label">Sumber Pendapatan</label>
                <input type="text" name="sumber_pendapatan" id="sumber_pendapatan" class="form-control @error('sumber_pendapatan') is-invalid @enderror" value="{{ old('sumber_pendapatan', $pendapatan->sumber_pendapatan) }}" required>
                @error('sumber_pendapatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan</label>
                <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="form-control @error('tanggal_pemasukan') is-invalid @enderror" value="{{ old('tanggal_pemasukan', $pendapatan->tanggal_pemasukan) }}" required>
                @error('tanggal_pemasukan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_hasil_pendapatan" class="form-label">Total Hasil Pendapatan</label>
                <input type="number" name="total_hasil_pendapatan" id="total_hasil_pendapatan" class="form-control @error('total_hasil_pendapatan') is-invalid @enderror" value="{{ old('total_hasil_pendapatan', $pendapatan->total_hasil_pendapatan) }}" min="0" required>
                @error('total_hasil_pendapatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('pendapatan.show', $pendapatan->id) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
