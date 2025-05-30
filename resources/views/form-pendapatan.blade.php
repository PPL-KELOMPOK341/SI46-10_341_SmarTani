@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="mb-4">Form Pendapatan</h2>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($penanamans) === 0)
                <div class="alert alert-warning">
                    <p>Anda belum memiliki data penanaman. Silakan tambah data penanaman terlebih dahulu.</p>
                    <a href="{{ route('penanaman.create') }}" class="btn btn-primary">Tambah Data Penanaman</a>
                </div>
            @else
                <form action="{{ route('pendapatan.store') }}" method="POST">
                    @csrf
                    <div class="card p-4">
                        <h5>Pilih Data Penanaman</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Nama Tanaman <span style="color: red;">*</span></label>
                                <select name="penanaman_id" class="form-control" required>
                                    <option value="">Pilih Tanaman</option>
                                    @foreach($penanamans as $penanaman)
                                        <option value="{{ $penanaman->id }}" {{ old('penanaman_id') == $penanaman->id ? 'selected' : '' }}>{{ $penanaman->nama_tanaman }} ({{ $penanaman->periode }})</option>
                                    @endforeach
                                </select>
                                @error('penanaman_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h5 class="mt-4">Informasi Pendapatan</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Sumber Pendapatan <span style="color: red;">*</span></label>
                                <input type="text" name="sumber_pendapatan" class="form-control" value="{{ old('sumber_pendapatan') }}" required>
                                @error('sumber_pendapatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal Pemasukan <span style="color: red;">*</span></label>
                                <input type="date" name="tanggal_pemasukan" class="form-control" value="{{ old('tanggal_pemasukan') }}" required>
                                @error('tanggal_pemasukan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Total Hasil Pendapatan (Rp) <span style="color: red;">*</span></label>
                                <input type="number" name="total_hasil_pendapatan" class="form-control" value="{{ old('total_hasil_pendapatan') }}" required min="0">
                                @error('total_hasil_pendapatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                <a href="{{ route('riwayat_pendapatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
