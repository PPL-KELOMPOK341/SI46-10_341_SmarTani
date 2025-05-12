@php
    $isEdit = isset($berita);
    $title = $isEdit ? 'Edit Berita' : 'Tambah Berita';
    $route = $isEdit ? route('berita.update', $berita->id) : route('berita.store');
    $method = $isEdit ? 'PUT' : 'POST';
@endphp

<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $isEdit ? $berita->judul : old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea class="form-control" id="konten" name="konten" rows="5" required>{{ $isEdit ? $berita->konten : old('konten') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $isEdit ? $berita->tanggal->format('Y-m-d') : old('tanggal') }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                @if($isEdit && $berita->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('images/berita/'.$berita->gambar) }}" width="100" class="img-thumbnail">
                        <p class="text-muted mt-1">Gambar saat ini</p>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>