<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Panen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>

    @include('layouts.header')

    <main class="content-container">
        <div class="content-box">
            <h3>Tabel Riwayat Penanaman</h3>
            <div class="filters">
                <button><i class="fas fa-sort"></i> Urutkan</button>
                <button><i class="fas fa-seedling"></i> N. Tanaman</button>
                <button><i class="fas fa-calendar-alt"></i> Periode</button>
                <input type="text" placeholder="Apa yang Kamu Cari">
                <input type="text" id="tanggalPicker" placeholder="Tanggal Panen">
                <button><i class="fas fa-search"></i></button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama Tanaman</th>
                        <th>Lokasi Lahan</th>
                        <th>Harga Jual Satuan</th>
                        <th>Tanggal Panen</th>
                        <th>Jumlah Hasil Panen</th>
                        <th>Kualitas Hasil Panen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jahe</td>
                        <td>Jl. Cimaung RT.001/RW.002</td>
                        <td>Rp 2.500</td>
                        <td>14 Juli 2025</td>
                        <td>200 kg</td>
                        <td>Bagus</td>
                        <td><button class="detail-btn">Lihat Detail</button></td>
                    </tr>
                    <tr>
                        <td>Jahe</td>
                        <td>Jl. Cimaung RT.001/RW.002</td>
                        <td>Rp 4.000</td>
                        <td>14 Desember 2025</td>
                        <td>50 kg</td>
                        <td>Kurang Bagus</td>
                        <td><button class="detail-btn">Lihat Detail</button></td>
                    </tr>
                    <tr>
                        <td>Jahe</td>
                        <td>Jl. Cimaung RT.001/RW.002</td>
                        <td>Rp 1.500</td>
                        <td>14 April 2026</td>
                        <td>350 kg</td>
                        <td>Sangat Bagus</td>
                        <td><button class="detail-btn">Lihat Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#tanggalPicker", {
            dateFormat: "d F Y",
            allowInput: true,
        });
    </script>
</body>
</html>
