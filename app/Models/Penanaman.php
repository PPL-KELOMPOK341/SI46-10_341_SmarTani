<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanaman extends Model
{
    use HasFactory;

    protected $table = 'penanamans';
    
    protected $fillable = [
        'nama_tanaman',
        'lokasi_lahan',
        'luas_lahan',
        'periode',
        'tanggal_penanaman',
        'jumlah_pupuk',
        'jumlah_bibit',
        'jenis_pestisida',
        'jenis_pupuk',
        'kendala',
        'catatan',
        'user_id'
    ];

    protected $casts = [
        'tanggal_penanaman' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
