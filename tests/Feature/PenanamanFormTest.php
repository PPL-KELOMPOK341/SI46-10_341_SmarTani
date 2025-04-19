<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Penanaman;

class PenanamanFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function form_penanaman_menyimpan_data_dengan_benar()
    {
        $response = $this->post('/form-penanaman', [
            'nama_tanaman' => 'Jahe',
            'lokasi_lahan' => 'Jl. Cimaung RT.001/RW.002',
            'luas_lahan' => 200,
            'periode' => 'Periode I',
            'tanggal_penanaman' => '2025-04-17',
            'jumlah_pupuk' => 200,
            'jumlah_bibit' => 100,
            'jenis_pestisida' => 'Organik',
            'jenis_pupuk' => 'Kompos',
            'kendala' => 'Hama ringan',
            'catatan' => 'Perlu penyuluhan tambahan'
        ]);

        $response->assertRedirect(); // redirect ke halaman sukses
        $this->assertDatabaseHas('penanaman', [
            'nama_tanaman' => 'Jahe',
            'lokasi_lahan' => 'Jl. Cimaung RT.001/RW.002',
        ]);
    }

    /** @test */
    public function form_penanaman_validasi_field_required()
    {
        $response = $this->post('/form-penanaman', []); // kirim kosong

        $response->assertSessionHasErrors([
            'nama_tanaman',
            'lokasi_lahan',
            'luas_lahan',
            'periode',
            'tanggal_penanaman',
            'jumlah_pupuk',
            'jumlah_bibit',
        ]);
    }
}