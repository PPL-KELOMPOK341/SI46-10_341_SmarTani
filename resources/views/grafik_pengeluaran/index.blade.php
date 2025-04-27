@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h2 class="text-2xl font-bold text-green-700 mb-6">Grafik Pengeluaran</h2>

    {{-- Debugging data (bisa dihapus jika sudah tidak diperlukan) --}}
    <!-- <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>  -->

    {{-- Container grafik --}}
    <div class="relative h-96 bg-white p-4 rounded-xl shadow">
        <canvas id="pengeluaranChart"></canvas>
    </div>
</div>

{{-- Load Chart.js dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Ambil konteks canvas untuk chart
    const ctx = document.getElementById('pengeluaranChart').getContext('2d');

    // Inisialisasi chart bar menggunakan Chart.js
    const pengeluaranChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($data->pluck('periode')) !!},  // Label periode pada sumbu X
            datasets: [{
                label: 'Total Pengeluaran (Rp)',
                data: {!! json_encode($data->pluck('total_pengeluaran')) !!},  // Data total pengeluaran pada sumbu Y
                backgroundColor: 'rgba(34, 197, 94, 0.7)',   // Warna batang grafik (hijau transparan)
                borderColor: 'rgba(22, 163, 74, 1)',         // Warna border batang grafik (hijau gelap)
                borderWidth: 2,
                borderRadius: 8,
                barThickness: 40,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            },
            scales : {
              y : { 
                  beginAtZero : true 
              }
          }
        }
    });
</script>
@endsection
