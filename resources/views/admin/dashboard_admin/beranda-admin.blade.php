@extends('admin.layouts.app')

@section('content')
<div class="container pt-5">
    <h4 class="fw-bold">Halaman Beranda</h4>
    <hr>
    <p>Selamat Datang</p>
    <h6><strong>Admin SmarTani</strong></h6>

    <div class="row mt-4">
        <div class="col-md-4">
            <a href="{{ url('/data-user') }}" class="text-decoration-none">
                <div class="card text-white bg-success mb-3 shadow">
                    <div class="card-body text-center">
                        <h3><i class="bi bi-person-fill"></i> 50</h3>
                        <h5>Petani</h5>
                    </div>
                    <div class="card-footer text-white text-center">
                        View Details <i class="bi bi-arrow-right-circle"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/pengaduan') }}" class="text-decoration-none">
                <div class="card text-white bg-danger mb-3 shadow">
                    <div class="card-body text-center">
                        <h3><i class="bi bi-person-fill"></i> 10</h3>
                        <h5>Pengaduan</h5>
                    </div>
                    <div class="card-footer text-white text-center">
                        View Details <i class="bi bi-arrow-right-circle"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('setting.website') }}" class="text-decoration-none">
                <div class="card text-white" style="background-color: #00BFFF;">
                    <div class="card-body text-center">
                        <h3><i class="bi bi-gear-fill"></i></h3>
                        <h5>Setting Website</h5>
                    </div>
                    <div class="card-footer text-white text-center">
                        View Details <i class="bi bi-arrow-right-circle"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
