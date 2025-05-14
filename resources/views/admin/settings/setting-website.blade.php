
    @extends('admin.layouts.app')

    @section('content')
    <div class="container pt-5">
        <h3 class="mb-4">Setting Website</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('setting.website.store') }}" method="POST" enctype="multipart/form-data">
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


