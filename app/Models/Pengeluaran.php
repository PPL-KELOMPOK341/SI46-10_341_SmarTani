<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
        'nama_tanaman',
        'periode',
        'tanggal_penanaman',
        'tanggal_pengeluaran',
        'jumlah_bibit',
        'total_biaya_bibit',
        'jumlah_pupuk',
        'total_biaya_pupuk',
        'upah_panen',
    ];
}
