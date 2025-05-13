<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'penanaman_id',
        'sumber_pendapatan',
        'tanggal_pemasukan',
        'total_hasil_pendapatan'
    ];

    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }
}
