<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
        'nama_tanaman',
        'periode',
        'tanggal_penanaman',
        'total_biaya_bibit',
        'upah_panen',
        'total_biaya_pupuk',
        'jumlah_pupuk',
        'tanggal_pengeluaran',
        'jumlah_bibit',
        'tujuan_pengeluaran',
        'harga',
        'catatan',
    ];
}