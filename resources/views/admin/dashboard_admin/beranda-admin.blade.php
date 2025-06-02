@extends('admin.layouts.app')

@section('content')
<div class="container" id="main-content">

    <!-- Header sambutan -->
    <div class="mb-4 text-center">
        <h2 class="fw-bold text-primary" style="font-size: 2.5rem;">
            <i class="fas fa-user-shield"></i> Selamat Datang, Admin SmarTani!
        </h2>
        <p class="text-muted" style="font-size: 1.1rem;">Kelola data dan pengaturan dengan mudah</p>
        <hr class="my-4">
    </div>

    <div class="row g-4">
        <!-- Card Petani -->
        <div class="col-md-4">
            <a href="{{ url('/admin/users') }}" class="text-decoration-none">
                <div class="card shadow-lg border-0 h-100 hover-zoom">
                    <div class="card-body text-center bg-success text-white rounded-top">
                        <h1><i class="fas fa-user fa-3x"></i></h1>
                        <h3>50</h3>
                        <h5>Petani</h5>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <span class="text-success fw-bold">View Details <i class="fas fa-arrow-circle-right"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Pengaduan -->
        <div class="col-md-4">
            <a href="{{ url('/pengaduan') }}" class="text-decoration-none">
                <div class="card shadow-lg border-0 h-100 hover-zoom">
                    <div class="card-body text-center bg-danger text-white rounded-top">
                        <h1><i class="fas fa-exclamation-triangle fa-3x"></i></h1>
                        <h3>10</h3>
                        <h5>Pengaduan</h5>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <span class="text-danger fw-bold">View Details <i class="fas fa-arrow-circle-right"></i></span>
                    </div>
                </div>
            </a>
        </div>

            <!-- Card Setting Website -->
            <div class="col-md-4">
                <a href="{{ route('setting.website') }}" class="text-decoration-none">
                    <div class="card shadow-lg border-0 h-100 hover-zoom">
                        <div class="card-body text-center text-white" style="background-color: #00BFFF; border-radius: .5rem .5rem 0 0;">
                            <h1><i class="fas fa-cogs fa-3x"></i></h1>
                            <h3>Setting Website</h3>
                        </div>
                        <div class="card-footer text-center bg-light">
                            <span class="text-primary fw-bold">View Details <i class="fas fa-arrow-circle-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

</div>

<style>
    .hover-zoom {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-zoom:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    /* Dark Mode Styles */
    body.dark-mode {
        background-color: #121212;
        color: #f1f1f1;
    }

    body.dark-mode .card {
        background-color: #1e1e1e;
        color: #f1f1f1;
    }

    body.dark-mode .card-footer {
        background-color: #2a2a2a;
    }

    body.dark-mode .text-primary {
        color: #4fc3f7 !important;
    }

    body.dark-mode .bg-light {
        background-color: #2a2a2a !important;
    }

    body.dark-mode .btn-outline-dark {
        color: #f1f1f1;
        border-color: #f1f1f1;
    }
</style>

<script>
    document.getElementById('toggle-darkmode').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        const icon = this.querySelector('i');
        if (document.body.classList.contains('dark-mode')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            this.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            this.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
        }
    });
</script>
@endsection
