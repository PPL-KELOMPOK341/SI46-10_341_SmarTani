<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class PendapatanTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    // TC1 - Input valid dengan semua field wajib
    public function test_valid_input_with_all_required_fields()
    {
        $response = $this->actingAs($this->user)->post(route('pendapatan.store'), [
            'nama_tanaman' => 'Tomato',
            'periode' => '1',
            'tanggal_penanaman' => '2025-04-01',
            'sumber_pendapatan' => 'Penjualan',
            'tanggal_pemasukan' => '2025-04-18',
            'total_hasil_pendapatan' => 300000,
        ]);

        $response->assertRedirect(route('pendapatan.create'));
        $this->assertDatabaseHas('pendapatans', [
            'nama_tanaman' => 'Tomato',
            'periode' => '1',
        ]);
        $response->assertSessionHas('success', 'Data pendapatan berhasil disimpan!');
    }

    // TC2 - Validasi format tanggal salah
    public function test_invalid_date_format_validation()
    {
        $response = $this->actingAs($this->user)->post(route('pendapatan.store'), [
            'nama_tanaman' => 'Tomato',
            'periode' => '1',
            'tanggal_penanaman' => '30-02-2025', // Format tanggal salah
            'sumber_pendapatan' => 'Penjualan',
            'tanggal_pemasukan' => '2025-04-18',
            'total_hasil_pendapatan' => 300000,
        ]);

        $response->assertSessionHasErrors(['tanggal_penanaman' => 'The tanggal penanaman field must be a valid date.']);
    }

    // TC3 - Validasi input numerik
    public function test_numeric_validation_for_total_pendapatan()
    {
        $response = $this->actingAs($this->user)->post(route('pendapatan.store'), [
            'nama_tanaman' => 'Tomato',
            'periode' => '1',
            'tanggal_penanaman' => '2025-04-01',
            'sumber_pendapatan' => 'Penjualan',
            'tanggal_pemasukan' => '2025-04-18',
            'total_hasil_pendapatan' => 'Rp 10 juta', // Bukan angka
        ]);

        $response->assertSessionHasErrors(['total_hasil_pendapatan' => 'The total hasil pendapatan field must be a number.']);
    }

    // TC4 - Field opsional boleh kosong
    public function test_optional_fields_can_be_empty()
    {
        $response = $this->actingAs($this->user)->post(route('pendapatan.store'), [
            'nama_tanaman' => 'Tomato',
            'periode' => '1',
            'tanggal_penanaman' => '2025-04-01',
            'sumber_pendapatan' => 'Penjualan',
            'tanggal_pemasukan' => '2025-04-18',
            'total_hasil_pendapatan' => 300000,
            // Field opsional
            'sumber_pendapatan_lainnya' => '',
            'harga' => '',
            'tanggal_pemasukan_lainnya' => '',
            'catatan' => '',
        ]);

        $response->assertRedirect(route('pendapatan.create'));
        $this->assertDatabaseHas('pendapatans', [
            'nama_tanaman' => 'Tomato',
            'periode' => '1',
        ]);
        $response->assertSessionHas('success');
    }

    // Test validasi field wajib
    public function test_required_fields_validation()
    {
        $response = $this->actingAs($this->user)->post(route('pendapatan.store'), [
            // Field wajib dikosongkan
            'nama_tanaman' => '',
            'periode' => '',
            'sumber_pendapatan' => '',
            'tanggal_pemasukan' => '',
            'total_hasil_pendapatan' => '',
        ]);

        $response->assertSessionHasErrors([
            'nama_tanaman',
            'periode',
            'sumber_pendapatan',
            'tanggal_pemasukan',
            'total_hasil_pendapatan',
        ]);
    }

    // Test guest tidak bisa akses form
    public function test_guest_cannot_access_pendapatan_form()
    {
        $response = $this->get(route('pendapatan.create'));
        $response->assertRedirect('/login');
    }

    // Test user terautentikasi bisa lihat form
    public function test_authenticated_user_can_view_pendapatan_form()
    {
        $response = $this->actingAs($this->user)->get(route('pendapatan.create'));
        $response->assertStatus(200);
        $response->assertSee('Form Pendapatan');
        $response->assertSee('Informasi Penanaman');
        $response->assertSee('Biaya Pendapatan');
        $response->assertSee('Pendapatan Lainnya');
    }
}