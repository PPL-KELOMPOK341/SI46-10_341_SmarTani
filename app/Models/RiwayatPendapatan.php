<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendapatan extends Model
{
    use HasFactory;

    protected $table = 'pendapatans'; // karena 'pendapatans' adalah nama tabel

    protected $fillable = [
        'tanggal_pemasukan',
        'total_hasil_pendapatan',
        'sumber_pendapatan',
    ];
}
