<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluarans';
    
    protected $fillable = [
        'penanaman_id',
        'total_biaya_bibit',
        'upah_panen',
        'total_biaya_pupuk',
        'jumlah_pupuk',
        'tanggal_pengeluaran',
        'jumlah_bibit',
        'tujuan_pengeluaran',
        'harga',
        'catatan'
    ];

    protected $casts = [
        'tanggal_pengeluaran' => 'date',
        'total_biaya_bibit' => 'decimal:2',
        'upah_panen' => 'decimal:2',
        'total_biaya_pupuk' => 'decimal:2',
        'harga' => 'decimal:2'
    ];

    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }
}
