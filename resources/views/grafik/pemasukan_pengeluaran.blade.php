@extends('layouts.app')

@section('content')
<main class="p-4 bg-white rounded shadow">
    <h2 class="mb-4">Grafik Pemasukan dan Pengeluaran</h2>

    {{-- Filter Tahun --}}
    <form action="{{ route('grafik.index') }}" method="GET" class="mb-6">
        <div class="d-flex align-items-center gap-3">
            <select name="tahun" class="form-select w-auto">
                <option value="">Semua Tahun</option>
                @foreach($tahunList as $thn)
                    <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>
                        {{ $thn }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">
                Filter
            </button>
        </div>
    </form>

    {{-- Grafik --}}
    <canvas id="grafikPemasukanPengeluaran" height="100"></canvas>
</main>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPemasukanPengeluaran').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($grafik->pluck('bulan')),
            datasets: [
                {
                    label: 'Total Pemasukan',
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    data: @json($grafik->pluck('pendapatan'))
                },
                {
                    label: 'Total Pengeluaran',
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    data: @json($grafik->pluck('pengeluaran'))
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Pemasukan vs Pengeluaran per Bulan'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(context.parsed.y);
                            return label;
                        }
                    }
                }
            },
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
</script>
@endsection
