<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Pendapatan;

class RiwayatPendapatanTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function authenticated_user_can_view_riwayat_pendapatan_page()
    {
        $response = $this->actingAs($this->user)->get(route('riwayat.pendapatan'));

        $response->assertStatus(200);
        $response->assertSee('Tabel Riwayat Pendapatan');
        $response->assertSee('Urutkan');
        $response->assertSee('Apa yang Kamu Cari');
    }

    /** @test */
    public function riwayat_pendapatan_shows_data_correctly()
    {
        $pendapatan = Pendapatan::factory()->create([
            'user_id' => $this->user->id,
            'tanggal_pemasukan' => '2025-04-20',
            'total_hasil_pendapatan' => 500000,
            'sumber_pendapatan' => 'Penjualan',
        ]);

        $response = $this->actingAs($this->user)->get(route('riwayat.pendapatan'));

        $response->assertStatus(200);
        $response->assertSee('20 April 2025');
        $response->assertSee('Rp 500.000');
        $response->assertSee('Penjualan');
    }

    /** @test */
    public function empty_riwayat_pendapatan_shows_empty_message()
    {
        $response = $this->actingAs($this->user)->get(route('riwayat.pendapatan'));

        $response->assertStatus(200);
        $response->assertSee('Belum ada data riwayat pendapatan.');
    }

    /** @test */
    public function guest_cannot_access_riwayat_pendapatan_page()
    {
        $response = $this->get(route('riwayat.pendapatan'));
        $response->assertRedirect('/login');
    }
}
