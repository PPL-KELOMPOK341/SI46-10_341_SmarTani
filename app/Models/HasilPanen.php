<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilPanen extends Model
{
    use HasFactory;

    protected $table = 'hasil_panens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'penanaman_id',
        'kualitas_hasil_panen',
        'tanggal_panen',
        'harga_jual_satuan',
        'jumlah_hasil_panen',
        'catatan'
    ];

    protected $casts = [
        'tanggal_panen' => 'date',
        'harga_jual_satuan' => 'decimal:2',
        'jumlah_hasil_panen' => 'decimal:2'
    ];
    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }
}
