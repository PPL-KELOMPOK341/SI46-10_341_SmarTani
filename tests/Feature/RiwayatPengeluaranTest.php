<?php

namespace Tests\Feature;

use App\Models\RiwayatPengeluaran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RiwayatPengeluaranTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function bisa_melihat_halaman_riwayat_pengeluaran()
    {
        // Arrange
        RiwayatPengeluaran::factory()->count(3)->create();

        // Act
        $response = $this->get('/riwayat-pengeluaran');

        // Assert
        $response->assertStatus(200);
        $response->assertSeeText('Riwayat Pengeluaran');
    }

    /** @test */
    public function bisa_melihat_detail_riwayat_pengeluaran()
    {
        // Arrange
        $pengeluaran = RiwayatPengeluaran::factory()->create([
            'keterangan' => 'Beli pupuk',
            'jumlah' => 50000,
        ]);

        // Act
        $response = $this->get('/riwayat-pengeluaran/' . $pengeluaran->id);

        // Assert
        $response->assertStatus(200);
        $response->assertSeeText('Beli pupuk');
        $response->assertSeeText('50000');
    }
}
