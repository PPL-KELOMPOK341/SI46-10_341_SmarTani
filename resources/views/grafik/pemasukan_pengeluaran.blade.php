@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Grafik Pemasukan dan Pengeluaran</h2>
    <canvas id="grafikChart" height="100"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const pengeluaran = @json($pengeluaran);
    const pemasukan = @json($pemasukan);

    // Gabungkan tanggal dari pemasukan dan pengeluaran jadi satu set unik
    const tanggalSet = new Set([
        ...pengeluaran.map(item => item.tanggal),
        ...pemasukan.map(item => item.tanggal)
    ]);
    const tanggalLabels = Array.from(tanggalSet).sort();

    // Buat map dari tanggal ke total pengeluaran
    const pengeluaranMap = Object.fromEntries(pengeluaran.map(item => [item.tanggal, item.total]));
    const pemasukanMap = Object.fromEntries(pemasukan.map(item => [item.tanggal, item.total]));

    const pengeluaranData = tanggalLabels.map(tgl => pengeluaranMap[tgl] || 0);
    const pemasukanData = tanggalLabels.map(tgl => pemasukanMap[tgl] || 0);

    const ctx = document.getElementById('grafikChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tanggalLabels,
            datasets: [
                {
                    label: 'Pemasukan',
                    data: pemasukanData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                },
                {
                    label: 'Pengeluaran',
                    data: pengeluaranData,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
