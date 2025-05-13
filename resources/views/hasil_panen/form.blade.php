@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <legend class="mb-3">{{ isset($hasilPanen) ? 'EDIT' : 'TAMBAH' }} HASIL PANEN</legend>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-info">
                <strong>Data Penanaman:</strong><br>
                Nama Tanaman: {{ $penanaman->nama_tanaman }}<br>
                Periode: {{ $penanaman->periode }}<br>
                Lokasi Lahan: {{ $penanaman->lokasi_lahan }}<br>
                Tanggal Penanaman: {{ $penanaman->tanggal_penanaman->format('d/m/Y') }}
            </div>

            <form action="{{ isset($hasilPanen) ? route('hasil-panen.update', $hasilPanen->id) : route('hasil-panen.store') }}" method="POST">
                @csrf
                @if(isset($hasilPanen))
                    @method('PUT')
                @endif

                <input type="hidden" name="penanaman_id" value="{{ $penanaman->id }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Kualitas Hasil Panen <span class="text-danger">*</span></label>
                            <select name="kualitas_hasil_panen" class="form-select" required>
                                <option value="">-- Pilih Kualitas --</option>
                                <option value="Baik" {{ (old('kualitas_hasil_panen', $hasilPanen->kualitas_hasil_panen ?? '') == 'Baik') ? 'selected' : '' }}>Baik</option>
                                <option value="Sedang" {{ (old('kualitas_hasil_panen', $hasilPanen->kualitas_hasil_panen ?? '') == 'Sedang') ? 'selected' : '' }}>Sedang</option>
                                <option value="Buruk" {{ (old('kualitas_hasil_panen', $hasilPanen->kualitas_hasil_panen ?? '') == 'Buruk') ? 'selected' : '' }}>Buruk</option>
                            </select>
                            
                            {{-- <input type="text" name="kualitas_hasil_panen" class="form-control" placeholder="Rp." value="{{ isset($hasilPanen) ? $hasilPanen->kualitas_hasil_panen : old('kualitas_hasil_panen') }}" required> --}}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Harga Jual Per KG <span class="text-danger">*</span></label>
                            <input type="number" name="harga_jual_satuan" class="form-control" placeholder="Rp." value="{{ isset($hasilPanen) ? $hasilPanen->harga_jual_satuan : old('harga_jual_satuan') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Tanggal Panen <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_panen" class="form-control" value="{{ isset($hasilPanen) ? $hasilPanen->tanggal_panen->format('Y-m-d') : old('tanggal_panen') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 200px;">Jumlah Hasil Panen <span class="text-danger">*</span></label>
                            <input type="number" name="jumlah_hasil_panen" class="form-control" placeholder="(kg)" value="{{ isset($hasilPanen) ? $hasilPanen->jumlah_hasil_panen : old('jumlah_hasil_panen') }}" required>
                        </div>

                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me3" style="width: 170px;">Catatan</label>
                            <input type="text" name="catatan" placeholder="(opsional)" class="form-control" value="{{ isset($hasilPanen) ? $hasilPanen->catatan : old('catatan') }}">
                        </div>
                    </div>
        
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">{{ isset($hasilPanen) ? 'Update' : 'Simpan' }}</button>
                    <a href="{{ route('hasil-panen.index') }}" class="btn-kembali btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

