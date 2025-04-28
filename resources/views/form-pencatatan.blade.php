@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">Form Pencatatan</h2>
    
    <div class="row justify-content-center" style="max-width: 800px; margin: 0 auto;">
        <!-- Baris Pertama -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('penanaman.create') }}" class="text-decoration-none">
                <div class="card h-100" style="width: 340px; height: 319px; border-radius: 15px; margin: 0 auto;">
                    <img src="{{ asset('images/pencatatan/form-penanaman.png') }}" class="card-img-top" alt="Penanaman" style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title text-center text-dark">Form Pencatatan Penanaman</h5>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-6 mb-4">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <div class="card h-100" style="width: 340px; height: 319px; border-radius: 15px; margin: 0 auto;">
                    <img src="{{ asset('images/pencatatan/form-pengeluaran.png') }}" class="card-img-top" alt="Pengeluaran" style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title text-center text-dark">Form Pengeluaran</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Baris Kedua -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('hasil-panen.create') }}" class="text-decoration-none">
                <div class="card h-100" style="width: 340px; height: 319px; border-radius: 15px; margin: 0 auto;">
                    <img src="{{ asset('images/pencatatan/form-hasil-panen.png') }}" class="card-img-top" alt="Hasil Panen" style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title text-center text-dark">Form Pencatatan Hasil Panen</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Baris Kedua -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('pendapatan.create') }}" class="text-decoration-none">
                <div class="card h-100" style="width: 340px; height: 319px; border-radius: 15px; margin: 0 auto;">
                    <img src="{{ asset('images/pencatatan/form-pendapatan.png') }}" class="card-img-top" alt="Pendapatan" style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title text-center text-dark">Form Pendapatan</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<style>
.card {
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: translateY(-5px);
}

.btn-primary {
    width: 100%;
    border-radius: 8px;
}
</style>
@endsection
