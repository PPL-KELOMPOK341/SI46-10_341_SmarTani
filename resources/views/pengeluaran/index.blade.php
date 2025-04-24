<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengeluaran</title>
</head>
<body>
    <h1>Daftar Pengeluaran</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama Tanaman</th>
                <th>Periode</th>
                <th>Tanggal Penanaman</th>
                <th>Total Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaran as $item)
                <tr>
                    <td>{{ $item->nama_tanaman }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->tanggal_penanaman }}</td>
                    <td>Rp {{ number_format($item->total_biaya_bibit + $item->upah_panen + $item->total_biaya_pupuk + $item->harga) }}</td>
                    <td><a href="{{ url('pengeluaran/' . $item->id) }}">Lihat</a></td>
                    <td><a href="{{ route('pengeluaran.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a></td>

                </tr>
            @endforeach

            


        </tbody>
    </table>
</body>
</html>