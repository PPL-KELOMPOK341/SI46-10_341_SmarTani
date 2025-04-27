<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pengeluaran';

    protected $fillable = [
        'nama_tanaman',
        'periode',
        'tanggal_penanaman',
        'tanggal_pengeluaran',
        'biaya_bibit',
        'biaya_pupuk',
        'upah_panen',
        'jumlah_pupuk',
        'jumlah_bibit',
        'keterangan',
        'jumlah',
    ];
}
