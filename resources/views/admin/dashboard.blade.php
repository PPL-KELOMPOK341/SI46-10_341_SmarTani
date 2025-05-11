@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h3 class="fw-bold">Halaman Beranda</h3>
    <p class="text-muted">Selamat Datang<br><strong>Admin SmarTani</strong></p>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-user fa-2x me-3"></i>
                    <div>
                        <h4 class="mb-1">50</h4>
                        <p class="mb-0">Petani</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="#" class="text-white text-decoration-none">
                        View Details <i class="fas fa-arrow-circle-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-danger h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-exclamation-circle fa-2x me-3"></i>
                    <div>
                        <h4 class="mb-1">10</h4>
                        <p class="mb-0">Pengaduan</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="#" class="text-white text-decoration-none">
                        View Details <i class="fas fa-arrow-circle-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-cogs fa-2x me-3"></i>
                    <div>
                        <h5 class="mb-0">Setting Website</h5>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="#" class="text-white text-decoration-none">
                        View Details <i class="fas fa-arrow-circle-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
