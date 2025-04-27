@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-green-700 mb-6">Grafik Pemasukan & Pengeluaran</h2>

    {{-- Filter Tahun --}}
    <form action="{{ route('grafik.keuangan') }}" method="GET" class="mb-6">
        <div class="flex flex-wrap items-center gap-4">
            <select name="tahun" class="border border-gray-300 px-3 py-2 rounded-md focus:ring focus:ring-green-200 focus:outline-none">
                <option value="">Semua Tahun</option>
                @foreach($tahunList as $thn)
                    <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>
                        {{ $thn }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-md">
                Filter
            </button>
        </div>
    </form>

    {{-- Grafik 2: Pie Chart --}}
    <div class="bg-white p-4 rounded-lg shadow-md text-center">
        <h3 class="text-xl font-semibold mb-4">Total Pemasukan vs Pengeluaran</h3>
        <canvas id="pieChart" class="mx-auto" style="max-width: 300px; height: auto;"></canvas>
    </div>
    
    {{-- Grafik 1: Bar Chart --}}
    <div class="bg-white p-4 rounded-lg shadow-md mb-8">
        <h3 class="text-xl font-semibold mb-4">Grafik Pemasukan & Pengeluaran per Periode</h3>
        <canvas id="grafikBar" height="120"></canvas>
    </div>

    
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart
    const ctxBar = document.getElementById('grafikBar').getContext('2d');
    const grafikBar = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: {!! json_encode($allPeriodes) !!},
            datasets: [
                {
                    label: 'Pemasukan',
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($allPeriodes->map(fn($p) => $pemasukan[$p] ?? 0)) !!}
                },
                {
                    label: 'Pengeluaran',
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($allPeriodes->map(fn($p) => $pengeluaran[$p] ?? 0)) !!}
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    // Pie Chart
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    const grafikPie = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Total Pemasukan', 'Total Pengeluaran'],
            datasets: [{
                backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                data: [
                    {{ $pemasukan->sum() }},
                    {{ $pengeluaran->sum() }}
                ]
            }]
        },
        options: {
            responsive:true
        }
    });
</script>
@endsection