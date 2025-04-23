<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Riwayat Hasil Panen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .section {
            margin-bottom: 30px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 20px;
        }

        .section:last-child {
            border: none;
        }

        .field {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .field span {
            font-weight: bold;
        }

        .field .value {
            font-weight: normal;
        }

        .actions {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 20px;
        }

        .actions a, .actions form {
            text-decoration: none;
        }

        .actions button {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-kembali { background: #28a745; color: white; }
        .btn-print   { background: #ffc107; color: black; }
        .btn-ubah    { background: #17a2b8; color: white; }
        .btn-hapus   { background: #dc3545; color: white; }
    </style>
</head>
<body>

    @include('layouts.header')

    <div class="container">
        <div class="section">
            <div class="field"><span>Nama Tanaman:</span><div class="value">{{ $data['nama_tanaman'] }}</div></div>
            <div class="field"><span>Periode Penanaman:</span><div class="value">{{ $data['periode'] }}</div></div>
            <div class="field"><span>Tanggal Penanaman:</span><div class="value">{{ $data['tanggal_penanaman'] }}</div></div>
        </div>

        <div class="section">
            <div class="field"><span>Lokasi Lahan:</span><div class="value">{{ $data['lokasi'] }}</div></div>
            <div class="field"><span>Harga Jual Satuan:</span><div class="value">{{ $data['harga_jual'] }}</div></div>
            <div class="field"><span>Tanggal Panen:</span><div class="value">{{ $data['tanggal_panen'] }}</div></div>
            <div class="field"><span>Jumlah Hasil Panen:</span><div class="value">{{ $data['jumlah'] }}</div></div>
            <div class="field"><span>Kualitas Hasil Panen:</span><div class="value">{{ $data['kualitas'] }}</div></div>
        </div>

        <div class="actions">
            <a href="{{ url('/riwayat-panen') }}"><button class="btn-kembali">Kembali</button></a>
            <a href="#"><button class="btn-print" onclick="window.print()">Print</button></a>
            <a href="#"><button class="btn-ubah">Ubah</button></a>
            <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button class="btn-hapus">Hapus</button>
            </form>
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>
