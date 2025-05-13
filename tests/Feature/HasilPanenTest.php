<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\HasilPanen;

class HasilPanenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function form_hasil_panen_menyimpan_data_dengan_benar()
    {
        $data = [
            'nama_tanaman' => 'Padi IR64',
            'periode' => 'Periode 1',
            'tanggal_penanaman' => '2024-01-01',
            'lokasi_lahan' => 'Lahan A',
            'kualitas_hasil_panen' => 'Bagus',
            'tanggal_panen' => '2024-04-01',
            'harga_jual_satuan' => 5000,
            'jumlah_hasil_panen' => 1000,
            'catatan' => 'Panen sukses',
        ];

        $response = $this->post('/hasil-panen/store', $data);

        $response->assertRedirect('/hasil-panen');

        $this->assertDatabaseHas('hasil_panens', [
            'nama_tanaman' => 'Padi IR64',
            'periode' => 'Periode 1',
            'jumlah_hasil_panen' => 1000,
        ]);
    }

    /** @test */
    public function form_hasil_panen_validasi_input_kosong()
    {
        $response = $this->post('/hasil-panen/store', []);

        $response->assertSessionHasErrors([
            'nama_tanaman',
            'periode',
            'tanggal_penanaman',
            'lokasi_lahan',
            'kualitas_hasil_panen',
            'tanggal_panen',
            'harga_jual_satuan',
            'jumlah_hasil_panen',
        ]);
    }
}
