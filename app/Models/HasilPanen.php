<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilPanen extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'hasil_panens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_tanaman', 'periode', 'tanggal_penanaman', 'lokasi_lahan',
        'kualitas_hasil_panen', 'tanggal_panen', 'harga_jual_satuan',
        'jumlah_hasil_panen', 'catatan'
    ];
    
}
