<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tanaman',
        'periode',
        'tanggal_penanaman',
        'sumber_pendapatan',
        'tanggal_pemasukan',
        'total_hasil_pendapatan',
        'sumber_pendapatan_lainnya',
        'harga',
        'tanggal_pemasukan_lainnya',
        'catatan',
    ];
}
