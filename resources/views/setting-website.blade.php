<!-- <!DOCTYPE html>
<html>
<head>
    <title>Setting Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h3>Setting Website</h3>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ url('/setting-website') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Judul Website</label>
                <input type="text" name="site_title" class="form-control" value="{{ old('site_title', $setting->site_title ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi Website</label>
                <input type="text" name="site_description" class="form-control" value="{{ old('site_description', $setting->site_description ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Logo Aplikasi</label><br>
                @if(!empty($setting->logo))
                    <img src="{{ asset($setting->logo) }}" alt="Logo" style="height: 60px;"><br><br>
                @endif
                <input type="file" name="logo" class="form-control">
            </div>
            <div class="mb-3">
                <label>Version</label>
                <input type="text" name="version" class="form-control" value="{{ old('version', $setting->version ?? '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html> -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Setting Website</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/setting-website') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul Website</label>
            <input type="text" name="site_title" class="form-control" value="{{ $setting->site_title ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi Website</label>
            <input type="text" name="site_description" class="form-control" value="{{ $setting->site_description ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Logo Aplikasi</label><br>
            @if(!empty($setting->site_logo))
                <img src="{{ asset($setting->site_logo) }}" alt="Logo" style="height: 80px;">
            @endif
            <input type="file" name="site_logo" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Version</label>
            <input type="text" name="site_version" class="form-control" value="{{ $setting->site_version ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection


