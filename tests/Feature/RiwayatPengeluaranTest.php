<?php

namespace Tests\Feature;

use App\Models\RiwayatPengeluaran;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RiwayatPengeluaranTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_melihat_halaman_riwayat_pengeluaran()
    {
        // Arrange
        $user = User::factory()->create(); // Kalau route pakai auth
        $this->actingAs($user); // Simulasikan user login

        $data = RiwayatPengeluaran::factory()->count(3)->create();

        // Act
        $response = $this->get('/riwayat-pengeluaran');

        // Assert
        $response->assertStatus(200);
        $response->assertSeeText('Riwayat Pengeluaran');

        // Tambahan: pastikan salah satu keterangan pengeluaran tampil
        $response->assertSeeText($data->first()->keterangan);

        // Optional: pastikan view yang dirender sesuai (jika view-nya riwayat.index)
        // $response->assertViewIs('riwayat.index');
    }

    /** @test */
    public function bisa_melihat_detail_riwayat_pengeluaran()
    {
        // Arrange
        $user = User::factory()->create(); // Jika butuh autentikasi
        $this->actingAs($user);

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

        // Optional: cek view kalau kamu tahu nama view-nya
        $response->assertViewIs('riwayat.show');
    }
}
